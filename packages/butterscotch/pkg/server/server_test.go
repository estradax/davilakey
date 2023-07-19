package server

import (
	"context"
	"testing"

	pb "davilakey.com/davilakey/proto/product"
	"github.com/DATA-DOG/go-sqlmock"
	"github.com/stretchr/testify/assert"
	"google.golang.org/protobuf/types/known/emptypb"
	"gorm.io/driver/postgres"
	"gorm.io/gorm"
	"gorm.io/gorm/logger"
)

func setupMockDB() (*gorm.DB, sqlmock.Sqlmock, error) {
	mockDb, mock, err := sqlmock.New()
	if err != nil {
		return nil, nil, err
	}

	dialector := postgres.New(postgres.Config{
		Conn:       mockDb,
		DriverName: "postgres",
	})

	db, err := gorm.Open(dialector, &gorm.Config{
		Logger: logger.Default.LogMode(logger.Info),
	})
	if err != nil {
		return nil, nil, err
	}

	return db, mock, nil
}

func TestServerFindAll(t *testing.T) {
	db, mock, err := setupMockDB()
	assert.NoError(t, err)

	s := New(db)

	tests := []struct {
		name string
		want *pb.ProductList
	}{
		{
			name: "should return a product list",
			want: &pb.ProductList{
				Data: []*pb.Product{
					{
						Id:          1,
						Name:        "foo",
						Description: "foo desc",
						Price:       199,
					},
					{
						Id:          2,
						Name:        "bar",
						Description: "bar desc",
						Price:       299,
					},
				},
			},
		},
	}

	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			rows := sqlmock.NewRows([]string{"id", "name", "description", "price"})
			for _, p := range tt.want.GetData() {
				rows.AddRow(p.GetId(), p.GetName(), p.GetDescription(), p.GetPrice())
			}

			mock.ExpectQuery(`SELECT`).WillReturnRows(rows)

			resp, err := s.FindAll(context.Background(), &emptypb.Empty{})
			if assert.NoError(t, err) {
				got := len(resp.GetData())
				want := len(tt.want.GetData())

				assert.Equal(t, want, got)
			}
		})
	}
}

func TestServerFindOne(t *testing.T) {
	db, mock, err := setupMockDB()
	assert.NoError(t, err)

	s := New(db)

	tests := []struct {
		name string
		req  *pb.ProductFindOneRequest
		want *pb.Product
	}{
		{
			name: "should return product",
			req: &pb.ProductFindOneRequest{
				Id: 69420,
			},
			want: &pb.Product{
				Id:          69420,
				Name:        "foo",
				Description: "foo desc",
				Price:       899,
			},
		},
	}

	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			rows := sqlmock.NewRows([]string{"id", "name", "description", "price"})
			rows.AddRow(tt.want.GetId(), tt.want.GetName(), tt.want.GetDescription(), tt.want.GetPrice())

			mock.ExpectQuery(`SELECT`).
				WithArgs(tt.req.GetId()).
				WillReturnRows(rows)

			resp, err := s.FindOne(context.Background(), tt.req)
			if assert.NoError(t, err) {
				assert.Equal(t, tt.req.GetId(), resp.GetId())
			}
		})
	}
}

func TestServerFindOneFail(t *testing.T) {
	db, mock, err := setupMockDB()
	assert.NoError(t, err)

	s := New(db)

	tests := []struct {
		name string
		req  *pb.ProductFindOneRequest
		want *pb.Product
	}{
		{
			name: "should return error",
			req: &pb.ProductFindOneRequest{
				Id: 123123,
			},
			want: &pb.Product{
				Id:          69420,
				Name:        "foo",
				Description: "foo desc",
				Price:       899,
			},
		},
		{
			name: "should return error when id is nil",
			req:  nil,
			want: &pb.Product{
				Id:          69420,
				Name:        "foo",
				Description: "foo desc",
				Price:       899,
			},
		},
	}

	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			rows := sqlmock.NewRows([]string{"id", "name", "description", "price"})
			rows.AddRow(tt.want.GetId(), tt.want.GetName(), tt.want.GetDescription(), tt.want.GetPrice())

			mock.ExpectQuery(`SELECT`).
				WithArgs(tt.req.GetId()).
				WillReturnError(gorm.ErrRecordNotFound)

			resp, err := s.FindOne(context.Background(), tt.req)

			if assert.Nil(t, resp) {
				assert.EqualError(t, err, gorm.ErrRecordNotFound.Error())
			}
		})
	}
}
