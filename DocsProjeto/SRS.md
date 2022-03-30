# Software Requirements Specification
## For <project name>

Version 0.1  
Prepared by <author>  
<organization>  
<date created>  
Template based on from: [IEEE 839 e ISO 29148](https://github.com/jam01/SRS-Template)

Table of Contents
=================
- [Software Requirements Specification](#software-requirements-specification)
  - [For <project name>](#for-project-name)
- [Table of Contents](#table-of-contents)
  - [Revision History](#revision-history)
  - [1. Introduction](#1-introduction)
    - [1.1 Document Purpose](#11-document-purpose)
    - [1.2 Product Scope](#12-product-scope)
    - [1.3 Definitions, Acronyms and Abbreviations](#13-definitions-acronyms-and-abbreviations)
    - [1.4 References](#14-references)
    - [1.5 Document Overview](#15-document-overview)
  - [2. Product Overview](#2-product-overview)
    - [2.1 Product Perspective](#21-product-perspective)
    - [2.2 Product Functions](#22-product-functions)
    - [2.3 Product Constraints](#23-product-constraints)
    - [2.4 User Characteristics](#24-user-characteristics)
    - [2.5 Assumptions and Dependencies](#25-assumptions-and-dependencies)
    - [2.6 Apportioning of Requirements](#26-apportioning-of-requirements)
  - [3. Requirements](#3-requirements)
    - [3.1 External Interfaces](#31-external-interfaces)
      - [3.1.1 User interfaces](#311-user-interfaces)
      - [3.1.2 Hardware interfaces](#312-hardware-interfaces)
      - [3.1.3 Software interfaces](#313-software-interfaces)
    - [3.2 Functional](#32-functional)
    - [3.3 Quality of Service](#33-quality-of-service)
      - [3.3.1 Performance](#331-performance)
      - [3.3.2 Security](#332-security)
      - [3.3.3 Reliability](#333-reliability)
      - [3.3.4 Availability](#334-availability)
    - [3.4 Compliance](#34-compliance)
    - [3.5 Design and Implementation](#35-design-and-implementation)
      - [3.5.1 Installation](#351-installation)
      - [3.5.2 Distribution](#352-distribution)
      - [3.5.3 Maintainability](#353-maintainability)
      - [3.5.4 Reusability](#354-reusability)
      - [3.5.5 Portability](#355-portability)
      - [3.5.6 Cost](#356-cost)
      - [3.5.7 Deadline](#357-deadline)
      - [3.5.8 Proof of Concept](#358-proof-of-concept)
  - [4. Verification](#4-verification)
  - [5. Appendixes](#5-appendixes)

## Revision History
| Name | Date    | Reason For Changes  | Version   |
| ---- | ------- | ------------------- | --------- |
|      |         |                     |           |
|      |         |                     |           |
|      |         |                     |           |

## 1. Introduction

### 1.1 Document Purpose
Este documento serve para dar uma apresentação detalhada sobre o sistema Peer Activity Evaluation. 
Onde vai ser explicado o propósito e as funcionalidades desse mesmo sistema tendo também como objetivo servir de base para o relatório final do projeto.

### 1.2 Product Scope
Este projeto de nome Peer Activity Evaluation, tem como objetivo facilitar aos formadores a atribuição de avaliações com base em trabalhos de grupo.
Onde os formandos têm como papel avaliar os restantes pertencentes do grupo de trabalho.
A nota final será calculada utilizando uma formula que engloba a avaliação tanto do professor como dos restantes membros do grupo.

### 1.3 Definitions, Acronyms and Abbreviations
PAE - Peer Activity Evaluation

### 1.4 References
IEEE. IEEE 830, and ISO/IEC/IEEE 29148:{2011,2017}

### 1.5 Document Overview
1. O primeiro capitulo tenta dar uma visão periférica sobre o documento e o projeto.
2. O segundo capitulo, Product Overview, foca-se em explicar os objetivos e funcionalidades do sistema.
3. ...

## 2. Product Overview

### 2.1 Product Perspective
![Diagram](../OutrosDocs/Diagramas/simple_diagram.png)

Este sistema surge como avaliação para um projeto de final de curso da turma TPSIPL1020 da ATEC - Academia de Formação.

O sistema servirá como complemento às atuais ferramentas de avaliaçao dos formandos (Microsoft Teams e Training Server) utilizadas pela ATEC. Foi criado devido à necessidade de avaliar formandos em contexto de trabalho de grupo pois as ferramentas atuais não disponibilizam esse tipo de avaliação.

### 2.2 Product Functions

#### 2.2.1 Use Case: Criação da tarefa
Um formador cria uma tarefa, é feita a atribuição da mesma a uma turma que será dividida em grupos.

#### 2.2.2 Use Case: Entrega da tarefa
Depois da realização da tarefa por parte dos formandos, é feita a entrega da mesma.

#### 2.2.3 Use Case: Avaliação
Após a entrega da tarefa, são realizadas notificações tanto para os formandos como para o formador.
Posteriormente, os formandos avaliam os membros do próprio grupo e o formador avalia o trabalho realizado.

### 2.3 Product Constraints

> TO DO

* Os envolvidos estão limitados ao tempo definido para desenvolver o sistema.

### 2.4 User Characteristics

* Administrador
* Coordenador
* Formandor
* Formando

### 2.5 Assumptions and Dependencies

> TO DO

### 2.6 Apportioning of Requirements

> TO DO

## 3. Requirements
> This section specifies the software product's requirements. Specify all of the software requirements to a level of detail sufficient to enable designers to design a software system to satisfy those requirements, and to enable testers to test that the software system satisfies those requirements.

> The specific requirements should:
* Be uniquely identifiable.
* State the subject of the requirement (e.g., system, software, etc.) and what shall be done.
* Optionally state the conditions and constraints, if any.
* Describe every input (stimulus) into the software system, every output (response) from the software system, and all functions performed by the software system in response to an input or in support of an output.
* Be verifiable (e.g., the requirement realization can be proven to the customer's satisfaction)
* Conform to agreed upon syntax, keywords, and terms.

### 3.1 External Interfaces
> This subsection defines all the inputs into and outputs requirements of the software system. Each interface defined may include the following content:
* Name of item
* Source of input or destination of output
* Valid range, accuracy, and/or tolerance
* Units of measure
* Timing
* Relationships to other inputs/outputs
* Screen formats/organization
* Window formats/organization
* Data formats
* Command formats
* End messages

#### 3.1.1 User interfaces
Define the software components for which a user interface is needed. Describe the logical characteristics of each interface between the software product and the users. This may include sample screen images, any GUI standards or product family style guides that are to be followed, screen layout constraints, standard buttons and functions (e.g., help) that will appear on every screen, keyboard shortcuts, error message display standards, and so on. Details of the user interface design should be documented in a separate user interface specification.

Could be further divided into Usability and Convenience requirements.

#### 3.1.2 Hardware interfaces
Describe the logical and physical characteristics of each interface between the software product and the hardware components of the system. This may include the supported device types, the nature of the data and control interactions between the software and the hardware, and communication protocols to be used.

#### 3.1.3 Software interfaces
Describe the connections between this product and other specific software components (name and version), including databases, operating systems, tools, libraries, and integrated commercial components. Identify the data items or messages coming into the system and going out and describe the purpose of each. Describe the services needed and the nature of communications. Refer to documents that describe detailed application programming interface protocols. Identify data that will be shared across software components. If the data sharing mechanism must be implemented in a specific way (for example, use of a global data area in a multitasking operating system), specify this as an implementation constraint.

### 3.2 Functional
> This section specifies the requirements of functional effects that the software-to-be is to have on its environment.

### 3.3 Quality of Service
> This section states additional, quality-related property requirements that the functional effects of the software should present.

#### 3.3.1 Performance
If there are performance requirements for the product under various circumstances, state them here and explain their rationale, to help the developers understand the intent and make suitable design choices. Specify the timing relationships for real time systems. Make such requirements as specific as possible. You may need to state performance requirements for individual functional requirements or features.

#### 3.3.2 Security
Specify any requirements regarding security or privacy issues surrounding use of the product or protection of the data used or created by the product. Define any user identity authentication requirements. Refer to any external policies or regulations containing security issues that affect the product. Define any security or privacy certifications that must be satisfied.

#### 3.3.3 Reliability
Specify the factors required to establish the required reliability of the software system at time of delivery.

#### 3.3.4 Availability
Specify the factors required to guarantee a defined availability level for the entire system such as checkpoint, recovery, and restart.

### 3.4 Compliance
Specify the requirements derived from existing standards or regulations, including:  
* Report format
* Data naming
* Accounting procedures
* Audit tracing

For example, this could specify the requirement for software to trace processing activity. Such traces are needed for some applications to meet minimum regulatory or financial standards. An audit trace requirement may, for example, state that all changes to a payroll database shall be recorded in a trace file with before and after values.

### 3.5 Design and Implementation

#### 3.5.1 Installation
Constraints to ensure that the software-to-be will run smoothly on the target implementation platform.

#### 3.5.2 Distribution
Constraints on software components to fit the geographically distributed structure of the host organization, the distribution of data to be processed, or the distribution of devices to be controlled.

#### 3.5.3 Maintainability
Specify attributes of software that relate to the ease of maintenance of the software itself. These may include requirements for certain modularity, interfaces, or complexity limitation. Requirements should not be placed here just because they are thought to be good design practices.

#### 3.5.4 Reusability
<!-- TODO: come up with a description -->

#### 3.5.5 Portability
Specify attributes of software that relate to the ease of porting the software to other host machines and/or operating systems.

#### 3.5.6 Cost
Specify monetary cost of the software product.

#### 3.5.7 Deadline
Specify schedule for delivery of the software product.

#### 3.5.8 Proof of Concept
<!-- TODO: come up with a description -->

## 4. Verification
> This section provides the verification approaches and methods planned to qualify the software. The information items for verification are recommended to be given in a parallel manner with the requirement items in Section 3. The purpose of the verification process is to provide objective evidence that a system or system element fulfills its specified requirements and characteristics.

<!-- TODO: give more guidance, similar to section 3 -->
<!-- ieee 15288:2015 -->

## 5. Appendixes