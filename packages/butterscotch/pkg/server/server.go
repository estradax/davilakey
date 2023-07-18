package server

import (
	"context"
	"errors"

	m "davilakey.com/davilakey/packages/butterscotch/pkg/model"
	pb "davilakey.com/davilakey/proto/product"
	"google.golang.org/protobuf/types/known/emptypb"
	"gorm.io/gorm"
)

type Server struct {
	pb.UnimplementedProductServiceServer

	DB *gorm.DB
}

var ErrRowsAffectedIsZero = errors.New("somehow rows affected is zero")

func (s *Server) FindAll(context.Context, *emptypb.Empty) (*pb.ProductList, error) {
	var products []m.Product

	result := s.DB.Find(&products)
	if result.Error != nil {
		return nil, result.Error
	}

	if result.RowsAffected != int64(len(products)) {
		return nil, errors.New("rows affected and it's length is not equal")
	}

	var ret []*pb.Product
	for _, v := range products {
		ret = append(ret, v.Protobuf())
	}

	return &pb.ProductList{
		Data: ret,
	}, nil
}

func (s *Server) FindOne(_ context.Context, r *pb.ProductFindOneRequest) (*pb.Product, error) {
	product := m.Product{ID: r.Id}

	result := s.DB.Find(&product)
	if result.Error != nil {
		return nil, result.Error
	}

	if result.RowsAffected <= 0 {
		return nil, ErrRowsAffectedIsZero
	}

	return product.Protobuf(), nil
}

func (s *Server) Create(_ context.Context, r *pb.ProductCreateRequest) (*pb.Product, error) {
	product := m.Product{
		Name:        r.Name,
		Description: r.Description,
		Price:       r.Price,
	}

	result := s.DB.Create(&product)
	if result.Error != nil {
		return nil, result.Error
	}

	if result.RowsAffected <= 0 {
		return nil, ErrRowsAffectedIsZero
	}

	return product.Protobuf(), nil
}

func (s *Server) Update(_ context.Context, r *pb.ProductUpdateRequest) (*emptypb.Empty, error) {
	product := m.Product{
		ID:          r.Id,
		Name:        r.Name,
		Description: r.Description,
		Price:       r.Price,
	}

	result := s.DB.Updates(&product)
	if result.Error != nil {
		return nil, result.Error
	}

	if result.RowsAffected <= 0 {
		return nil, ErrRowsAffectedIsZero
	}

	return &emptypb.Empty{}, nil
}

func (s *Server) Delete(_ context.Context, r *pb.ProductDeleteRequest) (*emptypb.Empty, error) {
	product := m.Product{ID: r.Id}

	result := s.DB.Delete(&product)
	if result.Error != nil {
		return nil, result.Error
	}

	if result.RowsAffected <= 0 {
		return nil, ErrRowsAffectedIsZero
	}

	return &emptypb.Empty{}, nil
}
