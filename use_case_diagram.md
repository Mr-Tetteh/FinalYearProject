# Use Case Diagram - Hospital Management System

```mermaid
graph TB
    %% Actors
    Admin((Admin))
    Manager((Manager))
    Receptionist((Receptionist))
    Nurse((Nurse))
    Doctor((Doctor))
    Pharmacist((Pharmacist))
    LabTech((Lab Technician))
    Account((Account Staff))
    Hospital((Hospital))
    Patient((Patient))
    System((System))

    %% Use Cases
    subgraph "Authentication & User Management"
        UC1[Login]
        UC2[Logout]
        UC3[Reset Password]
        UC4[Set New Password]
        UC5[Register User]
        UC6[Update User Role]
        UC7[Delete User]
        UC8[Restore User]
    end

    subgraph "Hospital Management"
        UC9[Register Hospital]
        UC10[View Hospitals]
        UC11[Delete Hospital]
        UC12[Update Hospital Info]
    end

    subgraph "Patient Management"
        UC13[Register Patient]
        UC14[View Patients]
        UC15[Edit Patient Info]
        UC16[Activate Patient]
        UC17[View Patient Card]
    end

    subgraph "Medical Records"
        UC18[Add Patient Record]
        UC19[View Patient Records]
        UC20[Update Patient Record]
        UC21[Add Nurse Notes]
        UC22[Add Doctor Notes]
        UC23[Add Pharmacist Notes]
        UC24[Add Lab Tech Notes]
    end

    subgraph "Pharmacy Management"
        UC25[Add Drug]
        UC26[View Drugs]
        UC27[Edit Drug Info]
        UC28[Update Drug Quantities]
        UC29[View Drug Details]
    end

    subgraph "Payment & Subscription"
        UC30[Process Payment]
        UC31[View Payment History]
        UC32[Update Subscription Plan]
        UC33[Checkout]
    end

    subgraph "System Operations"
        UC34[Generate Reports]
        UC35[Count Statistics]
        UC36[Deactivate Expired Patients]
    end

    %% Admin Relationships
    Admin --> UC1
    Admin --> UC2
    Admin --> UC5
    Admin --> UC6
    Admin --> UC7
    Admin --> UC8
    Admin --> UC9
    Admin --> UC10
    Admin --> UC11
    Admin --> UC12
    Admin --> UC13
    Admin --> UC14
    Admin --> UC15
    Admin --> UC16
    Admin --> UC17
    Admin --> UC18
    Admin --> UC19
    Admin --> UC20
    Admin --> UC21
    Admin --> UC22
    Admin --> UC23
    Admin --> UC24
    Admin --> UC25
    Admin --> UC26
    Admin --> UC27
    Admin --> UC28
    Admin --> UC29
    Admin --> UC30
    Admin --> UC31
    Admin --> UC32
    Admin --> UC33
    Admin --> UC34
    Admin --> UC35
    Admin --> UC36

    %% Manager Relationships
    Manager --> UC1
    Manager --> UC2
    Manager --> UC13
    Manager --> UC14
    Manager --> UC15
    Manager --> UC16
    Manager --> UC17
    Manager --> UC18
    Manager --> UC19
    Manager --> UC20
    Manager --> UC21
    Manager --> UC22
    Manager --> UC23
    Manager --> UC24
    Manager --> UC25
    Manager --> UC26
    Manager --> UC27
    Manager --> UC28
    Manager --> UC29
    Manager --> UC30
    Manager --> UC31
    Manager --> UC32
    Manager --> UC33
    Manager --> UC34
    Manager --> UC35

    %% Receptionist Relationships
    Receptionist --> UC1
    Receptionist --> UC2
    Receptionist --> UC13
    Receptionist --> UC14
    Receptionist --> UC15
    Receptionist --> UC16
    Receptionist --> UC17
    Receptionist --> UC18
    Receptionist --> UC19
    Receptionist --> UC20
    Receptionist --> UC21
    Receptionist --> UC22
    Receptionist --> UC23
    Receptionist --> UC24

    %% Nurse Relationships
    Nurse --> UC1
    Nurse --> UC2
    Nurse --> UC14
    Nurse --> UC17
    Nurse --> UC18
    Nurse --> UC19
    Nurse --> UC20
    Nurse --> UC21

    %% Doctor Relationships
    Doctor --> UC1
    Doctor --> UC2
    Doctor --> UC14
    Doctor --> UC17
    Doctor --> UC18
    Doctor --> UC19
    Doctor --> UC20
    Doctor --> UC22

    %% Pharmacist Relationships
    Pharmacist --> UC1
    Pharmacist --> UC2
    Pharmacist --> UC14
    Pharmacist --> UC17
    Pharmacist --> UC18
    Pharmacist --> UC19
    Pharmacist --> UC20
    Pharmacist --> UC23
    Pharmacist --> UC25
    Pharmacist --> UC26
    Pharmacist --> UC27
    Pharmacist --> UC28
    Pharmacist --> UC29
    Pharmacist --> UC30
    Pharmacist --> UC31
    Pharmacist --> UC33

    %% Lab Technician Relationships
    LabTech --> UC1
    LabTech --> UC2
    LabTech --> UC14
    LabTech --> UC17
    LabTech --> UC18
    LabTech --> UC19
    LabTech --> UC20
    LabTech --> UC24

    %% Account Staff Relationships
    Account --> UC1
    Account --> UC2
    Account --> UC14
    Account --> UC17
    Account --> UC30
    Account --> UC31
    Account --> UC32
    Account --> UC33

    %% System Relationships
    System --> UC36

    %% Hospital Relationships
    Hospital --> UC9
    Hospital --> UC10
    Hospital --> UC11
    Hospital --> UC12
    Hospital --> UC30
    Hospital --> UC31
    Hospital --> UC32
    Hospital --> UC33

    %% Patient Relationships
    Patient --> UC13
    Patient --> UC14
    Patient --> UC15
    Patient --> UC16
    Patient --> UC17
    Patient --> UC18
    Patient --> UC19
    Patient --> UC20

    %% Styling
    classDef actor fill:#e1f5fe,stroke:#01579b,stroke-width:2px
    classDef useCase fill:#f3e5f5,stroke:#4a148c,stroke-width:2px
    classDef subgraph fill:#f1f8e9,stroke:#33691e,stroke-width:2px

    class Admin,Manager,Receptionist,Nurse,Doctor,Pharmacist,LabTech,Account,Hospital,Patient,System actor
    class UC1,UC2,UC3,UC4,UC5,UC6,UC7,UC8,UC9,UC10,UC11,UC12,UC13,UC14,UC15,UC16,UC17,UC18,UC19,UC20,UC21,UC22,UC23,UC24,UC25,UC26,UC27,UC28,UC29,UC30,UC31,UC32,UC33,UC34,UC35,UC36 useCase
```

## Key Features:

1. **Role-Based Access Control**: Different user roles have access to different functionalities
2. **Multi-Hospital Support**: System can manage multiple hospitals with separate data
3. **Comprehensive Patient Management**: From registration to medical records
4. **Pharmacy Management**: Drug inventory and management
5. **Payment Processing**: Subscription and payment management
6. **Medical Records**: Role-specific notes for different healthcare professionals
7. **Reporting & Analytics**: Statistical data and reporting capabilities 