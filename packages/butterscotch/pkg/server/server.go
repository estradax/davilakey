package server

import (
	"context"
	"errors"

	m "davilakey.com/davilakey/packages/butterscotch/pkg/model"
	pb "davilakey.com/davilakey/proto/product"
	"google.golang.org/protobuf/types/known/emptypb"
	"google.golang.org/protobuf/types/known/timestamppb"
	"gorm.io/gorm"
)

type Server struct {
	pb.UnimplementedProductServiceServer

	DB *gorm.DB
}

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
		product := pb.Product{
			Id:          v.ID,
			Name:        v.Name,
			Description: v.Description,
			Price:       v.Price,
			CreatedAt:   timestamppb.New(v.CreatedAt),
			UpdatedAt:   timestamppb.New(v.UpdatedAt),
		}
		ret = append(ret, &product)
	}

	return &pb.ProductList{
		Data: ret,
	}, nil
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
		return nil, errors.New("somehow rows affected is zero")
	}

	ret := pb.Product{
		Id:          product.ID,
		Name:        product.Name,
		Description: product.Description,
		Price:       product.Price,
		CreatedAt:   timestamppb.New(product.CreatedAt),
		UpdatedAt:   timestamppb.New(product.UpdatedAt),
	}

	return &ret, nil
}
