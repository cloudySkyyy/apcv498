# Report 2: Software Requirement Specification

## Team SunTech

## Eli Salazar, Wesley Esquivel, Hondo Cabral, Songha Chheo, Dante Zelaya

## Section 1: Introduction

This week we met and selected the primary platform for our project foundation. We decided to go with AWS as our solution because of it's ease of use. AWS offers a complete platform solution.

## Section 2: Purpose

The purpose for choosing AWS is because it provides all of the necessary software tools needed in one place.

## Section 3: Scope

We are converting a simple spreadsheet into an interactive queried UI platform that will be filtered and meets the clients need and expands on current and future criteria.

## Section 4: Definitions

Currently the client is manually sorting an excel spreadsheet to keep track of schools with Computer Science and IT programs in Arizona. We will be building an Amazon Web Service that will store the information and make it retrievable via a simple UI. The client will be able to manipulate/update the data as needed.

The client cannot currently keep track of the amount of changing schools and their programs. We will utilize tools that will automatically notify the client of obsolete/new information.

## Section 5: User needs

The Client needs the solution to provide an easy platform to allow multiple Users to review and manipulate data. It needs to scale to incorporate additional categories and filter existing data.

## Section 6: System Features and Requirements

### A. Functional Requirements

* Database needs to be easily searchable and contain these specific parameters:

  * COUNTY: able to be sorted alphabetically
  * CITY; able to be sorted alphabetically
  * DISTRICT; able to be sorted alphabetically
  * DUAL ENROLLMENT; selectable boolean
  * COMMUNITY COLLEGE; selectable, able to be sorted alphabetically
  * ASSOCIATED PROGRAMS; selectable boolean

### B. Non-functional Requirements

* Reliability, responsive, maintainable, and user-friendly

* Multiple End users will be able to access the solution quickly without performance degradation

### C. Global Requirements

* The solution's data schema will need to be able to be securely accessible. The data will need to be relayed in real-time to all users with any changes made.

### D. Product and Project Constraints

* Product Constraints
  * cost, actual ownership of solution, limited to AWS features
* Project Constraints
  * completion time, UI quality, Team Skill set
* Other Constraints
  * If the client requests additional features as new requirements, we would be limited by time and AWS compatibility.
  * Compute resources and storage is limited by final cost.

## Section 7: RBS

* Efficient
* Scalable
* Cost-effective
* Collaborative
* Convenient
