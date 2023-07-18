package model

import "time"

type Product struct {
	ID          uint64 `gorm:"primaryKey"`
	Name        string
	Description string
	Price       float64
	CreatedAt   time.Time
	UpdatedAt   time.Time
}
