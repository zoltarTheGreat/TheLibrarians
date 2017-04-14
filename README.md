# Auto Library Requirement Document

## Introduction

The auto library system is an automatic system that is designed to keep track of the books that are rented out to the students as well as keeping track of availability of the books that exist in the inventory. The system will provide the function to add and remove books from the inventory while maintaining levels of access to the system itself. The users are guest, student and administrator (admin). The guest has only basic search books functions which is shared by the student and admin. The student can check out books and extend the rental using the student credentials. The student also has the option to reserve a book if the book is currently unavailable to be checked out at the moment. The admin can add any book to the inventory and remove any book from the inventory. The system as demonstrated by the user cases later on is designed to make a person’s library experience much more pleasant, easier and more user friendly. The reason why the team chosen this project is to make the inner workings of the library more affordable to the school and to make the person checking out books to do so easier through the use of computers as computerization is becoming more and more common place all around the world.

## Current System

The system currently in use at the university requires a staff of people around the clock to man the checkout counter in order to check out books or return them. While this is a good system, it always require people to be readily available for the role which may not be available for a myriad of reasons such as study time for classes, interviews for jobs and maybe just can’t make it to the counter on time. 

## Proposed System

### 3.1 Overview
This section provides a functional overview of the system. This will be divided into two parts.

### 3.2 Functional Requirements
- The student can check out available books for a week period.
- The student can  reserve unavailable books. 
- The student can search the inventory and filter results using the title, genre, year published, author name and availability.
- The system uses three levels of access; guest, student and admin.
- The admin has the capability to add new books.
- The admin has the capability to remove books. 
- The admin maintains a registry containing the names of those who have books checked out even after the removal of a book.
- A book that is a week overdue will be fined of $210.
- The admin has the capability to remove a user from the system.
- The system will display full inventory of available books before searching.

### 3.3 Non Functional Requirements

#### 3.3.1 Usability
- Any user who has basic computer literacy will be able to navigate the system without instructions.
- The system will provide visual cues to guide all users.
- Any users with english proficiency will be able to understand the system.

#### 3.3.2 Reliability
The team will test proportions of the code to ensure that they function well.

#### 3.3.3 Performance
The system will process typed keys and input by the user in less than a second.

#### 3.3.4 Supportability
The system does not accept patches as it is not in the time frame of the team at this time.

#### 3.3.5 Implementation 
The system will be implemented by Apache and MySql.

### 3.4 Constraints
- Must be web based.
- Must have a database.
- Must have front and back end to web page.
- Must have a minimum three users.