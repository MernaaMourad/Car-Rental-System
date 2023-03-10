
DROP DATABASE IF EXISTS `Car Rental System`;
Create database `Car Rental System`;


create table `ADMIN`(
                        `admin_id` int(11)  auto_increment,
                        `name` varchar(255) not null,
                        `password` varchar(255) not null,
                        `email` varchar(255) NOT NULL unique,
                        `admin_ssn`  char(9) NOT NULL unique,
                        PRIMARY KEY (`admin_id`)
);

CREATE TABLE IF NOT EXISTS `CUSTOMER` (
    `customer_id` int(11)  AUTO_INCREMENT,
    `password` varchar(255) not null,
    `fname` varchar(255) NOT NULL,
    `lname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL unique,
    `customer_ssn` char(9) NOT NULL unique,
    `phone` int(20) NOT NULL,
    `gender` char(1) NOT NULL,
    `remaining_balance` decimal (15,2) NOt NULL DEFAULT 0.00,
    `street` VARCHAR(255) NOT NULL,
    `city` VARCHAR(2255) NOT NULL,
    `state_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`customer_id`)
    ) ;


INSERT INTO `CUSTOMER` (`customer_id`,`password` ,`fname`,`lname`  ,`email`, `customer_ssn`, `phone`, `gender`, `street`, `city`, `state_name`) VALUES
                                                                                                                                                    (1,'1234' ,'mayar','ahmed' ,'mayar@yahoo.com', '30073147', 705053484, 'f', 'idk', 'alexandria', 'egypt'),
                                                                                                                                                    (2,'5678' ,'merna','mourad' ,'merna@gmail.com', '27695199', 707403614, 'f', 'idk','cairo', 'egypt'),
                                                                                                                                                    (3,'9101' ,'menna','abdelmeguid','menna@gmail.com', '12356799', 717056766, 'f','idk' ,'cairo', 'egypt');


INSERT INTO `ADMIN` (`admin_id`,`name` ,`password`,`email`,`admin_ssn`) VALUES (1,'mayarahmed','1234' ,'mayar@gmail.com','999999999');


CREATE TABLE `LOCATION` (
                            `location` varchar(255),
                            PRIMARY KEY(`location`)
);

CREATE TABLE IF NOT EXISTS `OFFICE` (
    `office_no`int(11) AUTO_INCREMENT,
    `location` varchar(255) ,
    `city` varchar(255) NOT NULL,
    PRIMARY KEY (`office_no`),
    FOREIGN KEY (`location`) REFERENCES `LOCATION`(`location`)
    );


CREATE TABLE IF NOT EXISTS `CARS` (
    `car_plateid` varchar(255) ,
    `image`text NOT NULL,
    `car_model` varchar(255) NOT NULL,
    `car_color` varchar(255) NOT NULL,
    `car_year` varchar(255) NOT NULL,
    `car_mileage` varchar(255) NOT NULL,
    `hire_cost` decimal (15,2)  NOT NULL,
    `capacity` int(11) NOT NULL,
    `status` varchar(255) NOT NULL DEFAULT 'Available',
    `location` varchar(255) ,
    PRIMARY KEY (`car_plateid`),

    FOREIGN KEY (`location`) references `LOCATION`
(`location`)
    );

INSERT INTO `LOCATION` (`location`) VALUES ('Egypt'),('UnitedStates');

INSERT INTO `OFFICE` (`location`, `city`) VALUES
                                              ('Egypt','Alex'),
                                              ('Egypt','Aswan'),
                                              ('UnitedStates','NEW YORK'),
                                              ('UnitedStates','california');


INSERT INTO `CARS` (`car_plateid`, `image`, `car_model`, `car_color`, `car_year`, `car_mileage`, `hire_cost`, `capacity`, `status`, `location`) VALUES
                                                                                                                                                    ('1230', 'car1.jpg', 'Mercedes Benz', 'white', '2000', '20000', '50.00', 5, 'Available', 'Egypt'),
                                                                                                                                                    ('1232', 'car7.jpg', 'Harrier', 'green', '2002', '20000', '70.00', 7, 'Available', 'Egypt'),
                                                                                                                                                    ('1234', 'car3.jpg', 'Harrier', 'green', '2002', '20000', '70.00', 7, 'Available', 'Egypt'),
                                                                                                                                                    ('1237', 'car5.jpg', 'Mercedes Benz', 'white', '2000', '20000', '50.00', 5, 'Available', 'Egypt'),
                                                                                                                                                    ('5673', 'car6.jpg', 'Range Rover', 'red', '2001', '30000', '60.00', 6, 'Available', 'Egypt'),
                                                                                                                                                    ('5674', 'car8.jpg', 'LandCruiser V8', 'pink', '2003', '30000', '80.00', 6, 'Available', 'Egypt'),
                                                                                                                                                    ('5677', 'car4.jpg', 'LandCruiser V8', 'pink', '2003', '30000', '80.00', 8, 'Available', 'Egypt'),
                                                                                                                                                    ('5679', 'car2.jpg', 'Range Rover', 'red', '2001', '30000', '60.00', 6, 'Available', 'Egypt');
CREATE TABLE IF NOT EXISTS `RESERVATION` (
    `reservation_no` int(11) NOT NULL unique AUTO_INCREMENT,
    `pickup_time` date ,
    `drop_time` date ,
    `reservation_time`  date default CURDATE(),
    `pickup_loc` VARCHAR(255) NOT NULL,
    `drop_loc` VARCHAR(255) NOT NULL,
    `payment_date` date ,
    `amount` decimal (15,2) NOT NULL,
    `paid`    char(1) NOT NULL DEFAULT 'F',
    `customer_id` int(11) ,
    `car_plateid` varchar(255),

    PRIMARY KEY (`car_plateid` , `drop_time`, `pickup_time`),
    FOREIGN KEY (`customer_id`) references `CUSTOMER`
(`customer_id`),
    FOREIGN KEY (`car_plateid`) references `CARS`
(`car_plateid`)
    );


CREATE TABLE IF NOT EXISTS `STATUS` (
                                        `return_day` date,
                                        `day` date,
                                        `car_plateid` varchar(255),

    PRIMARY KEY (`car_plateid`, `day`),
    FOREIGN KEY (`car_plateid`) references `CARS`
(`car_plateid`));

































