package main

import (
	"log"

	m "davilakey.com/davilakey/packages/butterscotch/pkg/model"
	"gorm.io/driver/postgres"
	"gorm.io/gorm"
)

func main() {
	dsn := "host=localhost user=butterscotchdb password=fooxbar dbname=butterscotchdb port=4532 sslmode=disable TimeZone=Asia/Shanghai"
	db, err := gorm.Open(postgres.Open(dsn), &gorm.Config{})
	if err != nil {
		log.Fatalln("failed to connect to database: ", err)
	}

	err = db.AutoMigrate(&m.Product{})
	if err != nil {
		log.Fatalln("failed to migrate: ", err)
	}
}
