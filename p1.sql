Create database p1
use p1

User Authentication:
User (ID, Username, Password, Email, Phone Number, UserType)

create table UsAuth(       
UserID varchar(15),
Username varchar(15),
paswd varchar(15),
email varchar(20),
phoneNo int,
UserType char(20),
primary key(UserID)
)
select * from UsAuth

Doctor (ID, Name, Specialty, Availability)
create table doc(
docID varchar(15) primary key,
docName char(15),
docSpecialty char(20),
docAvail BIT,
)
select * from doc

Patient (ID, Name, Age, Gender, MedicalHistory)
create table Patient(
PatID varchar(15),
PatName char(20),
PatAge int,
PatGen char(7),
PatMedHis varchar(20),
primary key(PatID),
)
select* from Patient

Appointment (ID, UserID, DoctorID, Date, TimeSlot, Status)

create table Appointment(    
appID varchar(15),
UserID varchar(15),
DoctorID varchar(15),
ADate date,
Timeslot time,
AStatus varchar(20)
primary key(appID,Adate) 
foreign key(DoctorID) references doc(docID) on delete cascade on update cascade,
foreign key(UserID) references UsAuth(UserID) on delete cascade on update cascade
)
select * from Appointment

Clinic (ID, Name, Address, Phone, DoctorID)

create table Clinic(
cliID varchar(10),
cliName char(20),
cliAdd varchar(30),
cliPhno int,
docID varchar(15),
primary key(cliID),
foreign key(docID) references doc(docID) on delete cascade on update cascade
)
select * from Clinic

Notification (ID, UserID, Message, Timestamp, Status)

create table Notify(      
NotUserID varchar(15),
NotSMS char(50),
NotTime time,
NotStatus char(20),
)
select * from Notify

Feedback and Ratings:
Rating (UserID, RatingValue, Feedback, Timestamp)

create table rate(
UserID varchar(15),
Ratingvalue int,
Feedback char(20),
Timestamp time,
foreign key(UserID) references UsAuth(UserID) on delete cascade on update cascade
)

Payment:
Payment (ID, UserID, AppointmentID, Amount, PaymentStatus, PaymentDate)

create table Payment(
PaymentID varchar(15),
UserID varchar(15),
AppointmentID varchar(15),
Amount int,
PaymentDate date,
PaymentStatus char(15),
)

Settings:
UserSettings (UserID, NotificationSettings, ReminderSettings, Language)

create table UserSet(
UserID varchar(15),
NotSett varchar(15),
remindSett varchar(15),
Lang char(15),
foreign key (UserID) references UsAuth(UserID) on delete cascade on update cascade
)

Chat/Communication:
ChatRoom (ID, User1ID, User2ID, LastMessageTime)

create table ChatRoom(
ChatRoomID varchar(15) primary key,
User1ID varchar(15),
User2ID varchar(15),
LastMessageTime time,
)

Message (ID, ChatRoomID, SenderID, ReceiverID, Message, Timestamp)
create table Message(
messId varchar(15),
ChatroomID varchar(15),
SenderID varchar(15), 
ReceiverID varchar(15), 
Message1 char(20), 
mTime time,
foreign key (ChatroomID) references Chatroom(ChatroomID) on delete cascade on update cascade
)
Localization:
Country (ID, Name)
City (ID, Name, CountryID)
create table Country(
CouID varchar(15) primary key,
CouName char(20),
)
select * from Country

create table City(
CitID varchar(15),
CitName char(20),
CouID varchar(15),
foreign key(CouID) references Country(CouID) on delete cascade on update cascade
)
select * from City
/*Analytics:
WebsiteAnalytics (ID, UserID, Event, Timestamp, Location, DeviceInfo)*/

Security and Logging:
AccessLog (ID, UserID, ActionType, Timestamp, IP, DeviceInfo)

create table secure(
SecureID varchar(15),
UserID varchar(15), 
ActionType char(15), 
Securetime time, 
IPadd VARBINARY(16) ,
DeviceInfo char(50),
foreign key (UserID) references UsAuth(UserID) on delete cascade on update cascade
)
select * from secure