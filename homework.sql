CREATE DATABASE homework DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS `homework`.`member` (
  `member_seq` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '회원번호',
  `email` VARCHAR(100) NOT NULL COMMENT '이메일주소',
  `name` VARCHAR(20) NOT NULL COMMENT '이름',
  `nick` VARCHAR(30) NOT NULL COMMENT '별명',
  `password` CHAR(255) NOT NULL COMMENT '비밀번호',
  `phone` VARCHAR(20) NOT NULL COMMENT '전화번호',
  `gender` CHAR(1) NULL COMMENT '성별(F:여성,M:남성)',
  PRIMARY KEY (`member_seq`),
  UNIQUE INDEX `nick_UNIQUE` (`nick` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `homework`.`order` (
  `member_seq` INT(10) UNSIGNED NOT NULL COMMENT 'MEMBER.MEMBER_SEQ(회원번호)',
  `order_no` CHAR(12) NOT NULL COMMENT '주문번호',
  `product` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL COMMENT '제품명(emoji포함)',
  `payment_date` DATETIME NOT NULL DEFAULT '1000-01-01 00:00:00' COMMENT '결제일시',
  UNIQUE INDEX `order_no_UNIQUE` (`order_no` ASC))
ENGINE = InnoDB;
