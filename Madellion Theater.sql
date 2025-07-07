create database madellionTheather;

use madellionTheather;

create table Patron
(
	Patron_PK_PatronId int auto_increment,
    FristName varchar(50),
    LastName Varchar(50),
    StreetAddress Varchar(50),
    City Varchar(50),
    State Varchar(50),
    ZipCode Varchar(50),
    CellPhone Varchar(50),
    Email Varchar(50),
    Password Varchar(35),
    Primary Key (Patron_PK_patronId )

);


INSERT INTO Patron(FristName,LastName,StreetAddress,City,State,ZipCode,CellPhone,Email)
VALUES
    ('Ephrem', 'Tadesse', '123 Haile Selassie St', 'Addis Ababa', 'AA', '12345', '+251911234567', 'ephrem.tadesse@gmail.com'),
    ('Zeritu', 'Abebe', '456 Menelik II St', 'Bahir Dar', 'AM', '56789', '+251922345678', 'zeritu.abebe@gmail.com'),
    ('Mulu', 'Tekle', '789 Adwa St', 'Mekelle', 'TI', '98765', '+251933456789', 'mulu.tekle@gmail.com'),
    ('Dawit', 'Girma', '321 Lalibela St', 'Lalibela', 'AM', '54321', '+251944567890', 'dawit.girma@gmail.com'),
    ('Selam', 'Mekonnen', '654 Gondar St', 'Gondar', 'GD', '23456', '+251955678901', 'selam.mekonnen@gmail.com'),
    ('Getachew', 'Wondimu', '987 Axum St', 'Axum', 'TI', '87654', '+251966789012', 'getachew.wondimu@gmail.com'),
    ('Tigist', 'Berhanu', '234 Harar St', 'Harar', 'HA', '34567', '+251977890123', 'tigist.berhanu@gmail.com'),
    ('Alemayehu', 'Teshome', '567 Dire Dawa St', 'Dire Dawa', 'DD', '87654', '+251988901234', 'alemayehu.teshome@gmail.com'),
    ('Genet', 'Alemu', '890 Jimma St', 'Jimma', 'OR', '45678', '+251999012345', 'genet.alemu@gmail.com'),
    ('Ermias', 'Lemma', '123 Awasa St', 'Awasa', 'SN', '76543', '+251911223344', 'ermias.lemma@gmail.com'),
    ('Yordanos', 'Abate', '456 Shashamane St', 'Shashamane', 'SN', '23456', '+251922334455', 'yordanos.abate@gmail.com'),
    ('Abel', 'Negash', '789 Hawassa St', 'Hawassa', 'SN', '54321', '+251933445566', 'abel.negash@gmail.com'),
    ('Bethlehem', 'Kassahun', '321 Debre Zeyit St', 'Debre Zeyit', 'OR', '87654', '+251944556677', 'bethlehem.kassahun@gmail.com'),
    ('Fekadu', 'Birhanu', '654 Dessie St', 'Dessie', 'AM', '34567', '+251955667788', 'fekadu.birhanu@gmail.com'),
    ('Birtukan', 'Abebe', '987 Gedeo St', 'Gedeo', 'SN', '23456', '+251966778899', 'birtukan.abebe@gmail.com'),
    ('Yoseph', 'Yimer', '234 Jijiga St', 'Jijiga', 'SO', '56789', '+251977889900', 'yoseph.yimer@gmail.com'),
    ('Hana', 'Hailu', '567 Gambela St', 'Gambela', 'GA', '87654', '+251988990011', 'hana.hailu@gmail.com'),
    ('Abiy', 'Gebre', '890 Nekemte St', 'Nekemte', 'OR', '45678', '+251999001122', 'abiy.gebre@gmail.com'),
    ('Tsion', 'Assefa', '123 Bishoftu St', 'Bishoftu', 'OR', '76543', '+251911112233', 'tsion.assefa@gmail.com'),
    ('Berhanu', 'Demissie', '456 Adama St', 'Adama', 'OR', '23456', '+251922223344', 'berhanu.demissie@gmail.com');
 
 create table SeatCategory
(
	SeatCategory_PK_CategoryId  int auto_increment,
    Category_Name varchar(30),
    Price double,
    
    Primary Key(SeatCategory_PK_CategoryId)
);
INSERT INTO SeatCategory (Category_Name, Price)
VALUES
    ('ORCHESTRA', 65.00),
	('MEZZANINE', 55.00),
    ('BALCONY', 40.00),
    ('BOX ', 85.00);  
    

   select * from SeatCategory; 
create table Seats
( 
	Seats_PK_SeatId int auto_increment,
	Seat_No varchar(10),
    SeatCategory_FK_CategoryId int,
   
    
    Primary Key (Seats_PK_SeatId),
    Foreign Key (SeatCategory_FK_CategoryId ) references SeatCategory(SeatCategory_PK_CategoryId )

);

insert into Seats(Seat_No, SeatCategory_FK_CategoryId) values

/*-------------------ORCHESTRA-----------------*/

('A1',1),('A2',1),('A3',1),('A4',1),('A5',1),('A6',1),('A7',1),('A8',1),('A9',1),('A10',1),
('A11',1),('A12',1),('A13',1),('A14',1),('A15',1),('A16',1),('A17',1),('A18',1),('A19',1),('A20',1),
('A21',1),('A22',1),('A23',1),('A24',1),('A25',1),('A26',1),('A27',1),('A28',1),('A29',1),('A30',1),

('B1',1),('B2',1),('B3',1),('B4',1),('B5',1),('B6',1),('B7',1),('B8',1),('B9',1),('B10',1),
('B11',1),('B12',1),('B13',1),('B14',1),('B15',1),('B16',1),('B17',1),('B18',1),('B19',1),('B20',1),
('B21',1),('B22',1),('B23',1),('B24',1),('B25',1),('B26',1),('B27',1),('B28',1),('B29',1),('B30',1),

('C1',1),('C2',1),('C3',1),('C4',1),('C5',1),('C6',1),('C7',1),('C8',1),('C9',1),('C10',1),
('C11',1),('C12',1),('C13',1),('C14',1),('C15',1),('C16',1),('C17',1),('C18',1),('C19',1),('C20',1),
('C21',1),('C22',1),('C23',1),('C24',1),('C25',1),('C26',1),('C27',1),('C28',1),('C29',1),('C30',1),

('D1', 1), ('D2', 1), ('D3', 1), ('D4', 1), ('D5', 1), ('D6', 1), ('D7', 1), ('D8', 1), ('D9', 1), ('D10', 1), 
('D11', 1), ('D12', 1), ('D13', 1), ('D14', 1), ('D15', 1), ('D16', 1), ('D17', 1), ('D18', 1), ('D19', 1), ('D20', 1), 
('D21', 1), ('D22', 1), ('D23', 1), ('D24', 1), ('D25', 1), ('D26', 1), ('D27', 1), ('D28', 1), ('D29', 1), ('D30', 1),

('E1', 1), ('E2', 1), ('E3', 1), ('E4', 1), ('E5', 1), ('E6', 1), ('E7', 1), ('E8', 1), ('E9', 1), ('E10', 1),
('E11', 1), ('E12', 1), ('E13', 1), ('E14', 1), ('E15', 1), ('E16', 1), ('E17', 1), ('E18', 1), ('E19', 1), ('E20', 1),
('E21', 1), ('E22', 1), ('E23', 1), ('E24', 1), ('E25', 1), ('E26', 1), ('E27', 1), ('E28', 1), ('E29', 1), ('E30', 1),

('F1', 1), ('F2', 1), ('F3', 1), ('F4', 1), ('F5', 1), ('F6', 1), ('F7', 1), ('F8', 1), ('F9', 1), ('F10', 1), 
('F11', 1), ('F12', 1), ('F13', 1), ('F14', 1), ('F15', 1), ('F16', 1), ('F17', 1), ('F18', 1), ('F19', 1), ('F20', 1), 
('F21', 1), ('F22', 1), ('F23', 1), ('F24', 1), ('F25', 1), ('F26', 1), ('F27', 1), ('F28', 1), ('F29', 1), ('F30', 1),

/*-------------------MEZZANINE-----------------*/

('G1', 2), ('G2', 2), ('G3', 2), ('G4', 2), ('G5', 2), ('G6', 2), ('G7', 2), ('G8', 2), ('G9', 2), ('G10', 2),
('G11', 2), ('G12', 2), ('G13', 2), ('G14', 2), ('G15', 2), ('G16', 2), ('G17', 2), ('G18', 2), ('G19', 2), ('G20', 2),
('G21', 2), ('G22', 2), ('G23', 2), ('G24', 2), ('G25', 2), ('G26', 2), ('G27', 2), ('G28', 2), ('G29', 2), ('G30', 2),

('H1', 2), ('H2', 2), ('H3', 2), ('H4', 2), ('H5', 2), ('H6', 2), ('H7', 2), ('H8', 2), ('H9', 2), ('H10', 2), 
('H11', 2), ('H12', 2), ('H13', 2), ('H14', 2), ('H15', 2), ('H16', 2), ('H17', 2), ('H18', 2), ('H19', 2), ('H20', 2),
('H21', 2), ('H22', 2), ('H23', 2), ('H24', 2), ('H25', 2), ('H26', 2), ('H27', 2), ('H28', 2), ('H29', 2), ('H30', 2),

('I1', 2), ('I2', 2), ('I3', 2), ('I4', 2), ('I5', 2), ('I6', 2), ('I7', 2), ('I8', 2), ('I9', 2), ('I10', 2),
('I11', 2), ('I12', 2), ('I13', 2), ('I14', 2), ('I15', 2), ('I16', 2), ('I17', 2), ('I18', 2), ('I19', 2), ('I20', 2),
('I21', 2), ('I22', 2), ('I23', 2), ('I24', 2), ('I25', 2), ('I26', 2), ('I27', 2), ('I28', 2), ('I29', 2), ('I30', 2),

('J1', 2), ('J2', 2), ('J3', 2), ('J4', 2), ('J5', 2), ('J6', 2), ('J7', 2), ('J8', 2), ('J9', 2), ('J10', 2),
('J11', 2), ('J12', 2), ('J13', 2), ('J14', 2), ('J15', 2), ('J16', 2), ('J17', 2), ('J18', 2), ('J19', 2), ('J20', 2),
('J21', 2), ('J22', 2), ('J23', 2), ('J24', 2), ('J25', 2), ('J26', 2), ('J27', 2), ('J28', 2), ('J29', 2), ('J30', 2),
('K1', 2), ('K2', 2), ('K3', 2), ('K4', 2), ('K5', 2), ('K6', 2), ('K7', 2), ('K8', 2), ('K9', 2), ('K10', 2),
('K11', 2), ('K12', 2), ('K13', 2), ('K14', 2), ('K15', 2), ('K16', 2), ('K17', 2), ('K18', 2), ('K19', 2), ('K20', 2),
('K21', 2), ('K22', 2), ('K23', 2), ('K24', 2), ('K25', 2), ('K26', 2), ('K27', 2), ('K28', 2), ('K29', 2), ('K30', 2),

('L1', 2), ('L2', 2), ('L3', 2), ('L4', 2), ('L5', 2), ('L6', 2), ('L7', 2), ('L8', 2), ('L9', 2), ('L10', 2), 
('L11', 2), ('L12', 2), ('L13', 2), ('L14', 2), ('L15', 2), ('L16', 2), ('L17', 2), ('L18', 2), ('L19', 2), ('L20', 2),
('L21', 2), ('L22', 2), ('L23', 2), ('L24', 2), ('L25', 2), ('L26', 2), ('L27', 2), ('L28', 2), ('L29', 2), ('L30', 2),

('M1', 2), ('M2', 2), ('M3', 2), ('M4', 2), ('M5', 2), ('M6', 2), ('M7', 2), ('M8', 2), ('M9', 2), ('M10', 2), 
('M11', 2), ('M12', 2), ('M13', 2), ('M14', 2), ('M15', 2), ('M16', 2), ('M17', 2), ('M18', 2), ('M19', 2), ('M20', 2),
('M21', 2), ('M22', 2), ('M23', 2), ('M24', 2), ('M25', 2), ('M26', 2), ('M27', 2), ('M28', 2), ('M29', 2), ('M30', 2),

('N1', 2), ('N2', 2), ('N3', 2), ('N4', 2), ('N5', 2), ('N6', 2), ('N7', 2), ('N8', 2), ('N9', 2), ('N10', 2), 
('N11', 2), ('N12', 2), ('N13', 2), ('N14', 2), ('N15', 2), ('N16', 2), ('N17', 2), ('N18', 2), ('N19', 2), ('N20', 2),
('N21', 2), ('N22', 2), ('N23', 2), ('N24', 2), ('N25', 2), ('N26', 2), ('N27', 2), ('N28', 2), ('N29', 2), ('N30', 2),

/*-------------------BALCONY-----------------*/

('AA1', 3), ('AA2', 3), ('AA3', 3), ('AA4', 3), ('AA5', 3), ('AA6', 3), ('AA7', 3), ('AA8', 3), ('AA9', 3), ('AA10', 3),
('AA11', 3), ('AA12', 3), ('AA13', 3), ('AA14', 3), ('AA15', 3), ('AA16', 3), ('AA17', 3), ('AA18', 3), ('AA19', 3), ('AA20', 3),
('AA21', 3), ('AA22', 3), ('AA23', 3), ('AA24', 3), ('AA25', 3), ('AA26', 3), ('AA27', 3), ('AA28', 3), ('AA29', 3), ('AA30', 3),

('BB1', 3), ('BB2', 3), ('BB3', 3), ('BB4', 3), ('BB5', 3), ('BB6', 3), ('BB7', 3), ('BB8', 3), ('BB9', 3), ('BB10', 3),
('BB11', 3), ('BB12', 3), ('BB13', 3), ('BB14', 3), ('BB15', 3), ('BB16', 3), ('BB17', 3), ('BB18', 3), ('BB19', 3), ('BB20', 3),
('BB21', 3), ('BB22', 3), ('BB23', 3), ('BB24', 3), ('BB25', 3), ('BB26', 3), ('BB27', 3), ('BB28', 3), ('BB29', 3), ('BB30', 3),

('CC1', 3), ('CC2', 3), ('CC3', 3), ('CC4', 3), ('CC5', 3), ('CC6', 3), ('CC7', 3), ('CC8', 3), ('CC9', 3), ('CC10', 3),
('CC11', 3), ('CC12', 3), ('CC13', 3), ('CC14', 3), ('CC15', 3), ('CC16', 3), ('CC17', 3), ('CC18', 3), ('CC19', 3), ('CC20', 3),
('CC21', 3), ('CC22', 3), ('CC23', 3), ('CC24', 3), ('CC25', 3), ('CC26', 3), ('CC27', 3), ('CC28', 3), ('CC29', 3), ('CC30', 3),

('DD1', 3), ('DD2', 3), ('DD3', 3), ('DD4', 3), ('DD5', 3), ('DD6', 3), ('DD7', 3), ('DD8', 3), ('DD9', 3), ('DD10', 3), 
('DD11', 3), ('DD12', 3), ('DD13', 3), ('DD14', 3), ('DD15', 3), ('DD16', 3), ('DD17', 3), ('DD18', 3), ('DD19', 3), ('DD20', 3),
('DD21', 3), ('DD22', 3), ('DD23', 3), ('DD24', 3), ('DD25', 3), ('DD26', 3), ('DD27', 3), ('DD28', 3),

('EE1', 3), ('EE2', 3), ('EE3', 3), ('EE4', 3), ('EE5', 3), ('EE6', 3), ('EE7', 3), ('EE8', 3), ('EE9', 3), ('EE10', 3),
('EE11', 3), ('EE12', 3), ('EE13', 3), ('EE14', 3), ('EE15', 3), ('EE16', 3), ('EE17', 3), ('EE18', 3), ('EE19', 3), ('EE20', 3), 
('EE21', 3), ('EE22', 3), ('EE23', 3), ('EE24', 3),
('FF1', 3), ('FF2', 3), ('FF3', 3), ('FF4', 3), ('FF5', 3), ('FF6', 3), ('FF7', 3), ('FF8', 3), ('FF9', 3), ('FF10', 3), 
('FF11', 3), ('FF12', 3), ('FF13', 3), ('FF14', 3), ('FF15', 3), ('FF16', 3), ('FF17', 3), ('FF18', 3), ('FF19', 3), ('FF20', 3),
('FF21', 3), ('FF22', 3), ('FF23', 3), ('FF24', 3),('X1', 4), ('X2', 4), ('X3', 4), ('X4', 4), ('X5', 4), ('X6', 4), ('X7', 4), ('X8', 4), ('X9', 4), ('X10', 4),
('X11', 4), ('X12', 4), ('X13', 4), ('X14', 4), ('X15', 4), ('X16', 4);

/*-------------------BOX-----------------*/
create table Production
(
	Production_PK_ProductionId int auto_increment,
	production_Name Varchar(30),
    Production_Type varchar(30),
    Active boolean,
    
    Primary Key(Production_PK_ProductionId)

);
Select Date from Performance where Performance_PK_PerformanceId=4;
create table Performance
(
	Performance_PK_PerformanceId int auto_increment,
    Time varchar(30),
    Date date,
    Production_FK_ProductionId int,
    
    Primary Key (Performance_PK_PerformanceId),
    Foreign Key (Production_FK_ProductionId ) references Production (Production_PK_ProductionId )
    
    
);
create table Tickets
(
	Tickets_PK_TicketId int auto_increment,
	Patron_FK_PatronId int,
    Seats_FK_SeatId int,
	Performance_FK_PerformanceId int,
    Date date,
    Reserved boolean,
    Purchased boolean,
    
    Primary Key (Tickets_PK_TicketId),
	Foreign Key (Performance_FK_PerformanceId ) references Performance (Performance_PK_PerformanceId),
    Foreign Key (Patron_FK_PatronId ) references Patron(Patron_PK_PatronId),
    Foreign Key (Seats_FK_SeatId ) references Seats(Seats_PK_SeatId)
    

);

create table Movies
(
	Movies_PK_Movie_Id int auto_increment,
    Image varchar(1000),
    Movie_Name varchar(100) unique,
    Writer Varchar(100),
    Director Varchar(100),
    Producer Varchar (100),
    Duration Varchar(30),
    Budget Double,
    Movie varchar(1000),
    Cellphone varchar(30),
    Email varchar(50),
    
    Primary key (Movies_PK_Movie_Id)
    
);

-- drop table movies;
Create table MovieViewed
(  	
	MovieViewed_PK_View_Id int auto_increment,
	Date date,
	Patron_FK_PatronId int,
	Movies_FK_Movie_Id int,
    Liked boolean,
    Comment varchar(1500),
    Rating int ,
    Primary key (MovieViewed_PK_View_Id),
    Foreign Key (Patron_FK_PatronId ) references Patron (Patron_PK_PatronId ),
    Foreign Key (Movies_FK_Movie_Id ) references Movies (Movies_PK_Movie_Id)
);
select * from MovieViewed;
-- drop table movieViewed;
Select max(MovieViewed_PK_View_Id) as ViewID from movieviewed ;
select max(Tickets_PK_TicketId) from Tickets;
select * from Tickets;
-- drop table tickets;
-- drop table seats;
-- drop table seatcategory;
-- drop table production;
-- drop table performance;
-- drop table patron;
SELECT max(Patron_PK_Patronid) from patron;
select * from seatcategory;
select * from seats where  SeatCategory_FK_CategoryId=3;
select * from patron;
select * from production;
select * from performance;
select* from Tickets;

create table Comment
(
	Comment_PK_Comment_Id int auto_increment,
    Comment varchar(1500),
    Date date,
	-- Patron_FK_PatronId int,
	-- Movies_FK_Movie_Id int,
    MovieViewed_FK_View_Id int,
    
    Primary Key (Comment_PK_Comment_Id),
	 Foreign Key (MovieViewed_FK_View_Id ) references MovieViewed (MovieViewed_PK_View_Id)
	-- Foreign Key (Patron_FK_PatronId ) references Patron (Patron_PK_PatronId ),
    -- Foreign Key (Movies_FK_Movie_Id ) references Movies (Movies_PK_Movie_Id)
    
);

-- drop table Comment

-- VIEWS

-- Seat Detail
create view SeatDetail as 
	select s.Seats_PK_SeatId as SeatId,s.Seat_No ,c. Category_Name,c.Price
    from SeatCategory c, Seats s
    where c.SeatCategory_PK_CategoryId = s.SeatCategory_FK_CategoryId;

select * from SeatDetail;

 -- Reserved Seats
 Create view Reserved as
	select tickets.Tickets_PK_TicketId,tickets.Date, tickets.Patron_FK_PatronId , tickets.Performance_FK_PerformanceId, SeatDetail.Seat_No, SeatDetail.Price 
    from tickets,SeatDetail
    where tickets.Reserved=1 AND SeatDetail.SeatId=tickets. Seats_FK_SeatId; 
  

  Select * from Reserved; 

-- Available seat
create view avialableSeat as
	select SeatDetail.*
    from  SeatDetail,Tickets
    where SeatDetail.SeatId NOT IN
	(SELECT   Seats_FK_SeatId
	 FROM  Tickets, SeatDetail
	 WHERE SeatDetail.SeatId = Tickets.Seats_FK_SeatId AND  
     (Tickets.Reserved='1' or Tickets.Purchased=1) AND Tickets.Performance_FK_PerformanceId=0
    )
    ;

select * FROM  avialableSeat ;
-- drop view avialableSeat;



-- Production detail
create view  ProdDetail    as
	Select perf.Performance_PK_PerformanceId as PerformanceId,prod.Production_Name,Prod.Production_Type,perf.Time,Perf.Date 
	from Production prod , Performance perf
	where perf.Production_FK_ProductionId = Prod.Production_PK_ProductionId and perf.date>curdate();
select * from  ProdDetail order by PerformanceId;

-- every production detail

create view ProductionDetail as 
	Select perf.Performance_PK_PerformanceId as PerformanceId,prod.Production_Name,Prod.Production_Type,perf.Time,Perf.Date 
	from Production prod , Performance perf
	where perf.Production_FK_ProductionId = Prod.Production_PK_ProductionId;
select * from  ProductionDetail order by PerformanceId;

-- No of tickets purchased by a patron
create view PatronTicket as
	select Patron.Patron_PK_PatronId  as PatronId ,
    concat(Patron.FristName, Patron.LastName)as PatronName,
   ProductionDetail.* ,count(Tickets.Patron_FK_PatronId ) as count
    from Patron,Tickets,ProductionDetail
    where Patron.Patron_PK_PatronId=Tickets.Patron_FK_PatronId AND ProductionDetail.PerformanceId=tickets.Performance_FK_PerformanceId  and Tickets.purchased=1
    group By tickets.Performance_FK_PerformanceId,Patron.Patron_PK_PatronId;

select * from PatronTicket; 
-- drop view PatronTicket;



-- sold per  perfomance

create view  soldTickets as
	select ProductionDetail.* ,count(Tickets_PK_TicketId ) as TicketSold
    from ProductionDetail ,Tickets
    where ProductionDetail.PerformanceId =Tickets.Performance_FK_PerformanceId  and Tickets.purchased=1
	group by Tickets.Performance_FK_PerformanceId ;

 select * from soldTickets;
 -- drop view soldTickets;
 
 
SELECT SeatDetail.*
                        from  SeatDetail
                        where SeatDetail.SeatId NOT IN
                        (SELECT  Seats_FK_SeatId
                        FROM  Tickets, SeatDetail
                        WHERE SeatDetail.SeatId = Tickets.Seats_FK_SeatId AND 
                        (Tickets.Reserved='1' or Tickets.Purchased='1') AND 
                        Tickets.Performance_FK_PerformanceId=11);

 
 
