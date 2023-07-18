package main

import (
	"flag"
	"log"

	m "davilakey.com/davilakey/packages/butterscotch/pkg/model"
	"gorm.io/driver/postgres"
	"gorm.io/gorm"
	"gorm.io/gorm/logger"
)

const (
	migrateAction = "migrate"
	freshAction   = "fresh"
)

var tables = []any{
	&m.Product{},
}

func main() {
	action := flag.String("action", migrateAction, "Action")

	flag.Parse()

	dsn := "host=localhost user=butterscotchdb password=fooxbar dbname=butterscotchdb port=4532 sslmode=disable TimeZone=Asia/Shanghai"
	db, err := gorm.Open(postgres.Open(dsn), &gorm.Config{
		Logger: logger.Default.LogMode(logger.Info),
	})
	if err != nil {
		log.Fatalln("failed to connect to database: ", err)
	}

	switch *action {
	case migrateAction:
		if err = db.AutoMigrate(tables...); err != nil {
			log.Fatalln("failed to migrate: ", err)
		}
	case freshAction:
		if err = db.Migrator().DropTable(tables...); err != nil {
			log.Fatalln("failed to drop the table: ", err)
		}
		if err = db.AutoMigrate(tables...); err != nil {
			log.Fatalln("failed to migrate after drop: ", err)
		}
	default:
		log.Fatalln("unknown action")
	}
}
