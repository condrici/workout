# DDD

Domain-Driven Design (DDD) is a methodology for designing and managing the complexity of software projects 
by focusing on the domain model. Implementing DDD in PHP requires some understanding of DDD principles, 
which are then translated into code through various design patterns.

## Glossary

[1] Domain Model (business rules and logic): 
- Represents the core business concepts, entities, and processes
- Defined in a way that they are isolated from infrastructure concerns
- Allows the business logic to evolve independently from technological changes

[2] Bounded Context: 
- Defines the boundary within which a particular model applies
- In a microservice-based architecture, a microservice should not be larger than a Bounded Context

[3] Entities and Value Objects: 
- Entities (unique id, they represent a database entity, can be anemic or rich)
- ValueObjects (no unique id, immutable, structural equality, self-validation)

[4] Aggregates:
- A group of related entities and value objects treated as a single unit

[5] Repositories: 
- Handle retrieving and persisting aggregates.

## Example, 4-TIER, DDD, microservice

./src/app </br >
./src/app/BoundedContextOne </br >
./src/app/BoundedContextTwo </br >

#### [User Interface Layer] a.k.a. presentation layer <br />
./src/app/BoundedContextOne/infrastructure/gui </br >
./src/app/BoundedContextOne/infrastructure/gui/controller </br >
./src/app/BoundedContextOne/infrastructure/gui/view

#### [Application Layer], a.k.a. application logic <br />
./src/app/BoundedContextOne/app </br >
./src/app/BoundedContextOne/app/command </br >
./src/app/BoundedContextOne/app/query </br >

#### [Domain Layer], a.k.a. business Logic, different based on Bounded Context <br />
./src/app/BoundedContextOne/domain </br >
./src/app/BoundedContextOne/domain/Company </br >

#### [Infrastructure Layer] a.k.a. Data Access Layer <br />
./src/app/BoundedContextOne/infrastructure </br >
./src/app/BoundedContextOne/infrastructure/api </br >
./src/app/BoundedContextOne/infrastructure/api/rest </br >
./src/app/BoundedContextOne/infrastructure/persistence </br >
./src/app/BoundedContextOne/infrastructure/persistence/doctrine </br >
./src/app/BoundedContextOne/infrastructure/repository </br >