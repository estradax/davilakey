package main

import (
	"log"
	"net"

	"davilakey.com/davilakey/packages/butterscotch/pkg/server"
	pb "davilakey.com/davilakey/proto/product"
	"google.golang.org/grpc"
	"google.golang.org/grpc/reflection"
	"gorm.io/driver/postgres"
	"gorm.io/gorm"
	"gorm.io/gorm/logger"
)

func main() {
	dsn := "host=localhost user=butterscotchdb password=fooxbar dbname=butterscotchdb port=4532 sslmode=disable TimeZone=Asia/Shanghai"
	db, err := gorm.Open(postgres.Open(dsn), &gorm.Config{
		Logger: logger.Default.LogMode(logger.Info),
	})
	if err != nil {
		log.Fatalln("error: failed to connect to database: ", err)
	}

	lis, err := net.Listen("tcp", ":50051")
	if err != nil {
		log.Fatal("error: cannot tcp listen: ", err)
	}

	grpcServer := grpc.NewServer()
	s := server.Server{
		DB: db,
	}

	pb.RegisterProductServiceServer(grpcServer, &s)

	reflection.Register(grpcServer)

	if err := grpcServer.Serve(lis); err != nil {
		log.Fatal("error: cannot serve: ", err)
	}
}
