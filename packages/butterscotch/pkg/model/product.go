package model

import (
	"time"

	pb "davilakey.com/davilakey/proto/product"
	"google.golang.org/protobuf/types/known/timestamppb"
)

type Product struct {
	ID          uint64 `gorm:"primaryKey"`
	Name        string
	Description string
	Price       float64
	CreatedAt   time.Time
	UpdatedAt   time.Time
}

func (p Product) Protobuf() *pb.Product {
	return &pb.Product{
		Id:          p.ID,
		Name:        p.Name,
		Description: p.Description,
		Price:       p.Price,
		CreatedAt:   timestamppb.New(p.CreatedAt),
		UpdatedAt:   timestamppb.New(p.UpdatedAt),
	}
}
