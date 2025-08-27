# Data Flow Diagram - Hospital Management System

## Main System Data Flow

```mermaid
graph TB
    %% External Entities
    Users((Users))
    Paystack((Paystack API))
    Email((Email System))
    
    %% Data Stores
    DB[(Database)]
    Cache[(Redis Cache)]
    Storage[(File Storage)]
    
    %% Processes
    subgraph "Frontend Layer"
        F1[Vue.js Components]
        F2[Router & Guards]
        F3[State Management]
        F4[API Client]
    end
    
    subgraph "API Gateway Layer"
        G1[Laravel Routes]
        G2[Middleware]
        G3[Authentication]
    end
    
    subgraph "Business Logic Layer"
        B1[User Management]
        B2[Patient Management]
        B3[Medical Records]
        B4[Pharmacy Management]
        B5[Hospital Management]
        B6[Payment Processing]
    end
    
    subgraph "Data Access Layer"
        D1[Eloquent Models]
        D2[Database Migrations]
        D3[Seeders & Factories]
    end
    
    subgraph "Background Services"
        Q1[Queue Workers]
        Q2[Scheduled Jobs]
        Q3[Payment Verification]
    end

    %% Data Flows
    Users --> F1
    Users --> F2
    Users --> F3
    
    F1 --> F4
    F2 --> F4
    F3 --> F4
    
    F4 --> G1
    G1 --> G2
    G2 --> G3
    
    G3 --> B1
    G3 --> B2
    G3 --> B3
    G3 --> B4
    G3 --> B5
    G3 --> B6
    
    B1 --> D1
    B2 --> D1
    B3 --> D1
    B4 --> D1
    B5 --> D1
    B6 --> D1
    
    D1 --> DB
    D1 --> Cache
    D1 --> Storage
    
    B6 --> Paystack
    Paystack --> B6
    
    B1 --> Email
    B6 --> Email
    
    B6 --> Q1
    Q1 --> Q3
    Q3 --> Paystack
    Q3 --> DB
    
    Q2 --> B2
    Q2 --> DB
    
    %% Data Return Flows
    DB --> D1
    Cache --> D1
    Storage --> D1
    
    D1 --> B1
    D1 --> B2
    D1 --> B3
    D1 --> B4
    D1 --> B5
    D1 --> B6
    
    B1 --> G3
    B2 --> G3
    B3 --> G3
    B4 --> G3
    B5 --> G3
    B6 --> G3
    
    G3 --> F4
    F4 --> F1
    F4 --> F2
    F4 --> F3
    
    F1 --> Users
    F2 --> Users
    F3 --> Users
```

## Detailed Data Flow by Module

### 1. User Authentication Data Flow

```mermaid
graph LR
    subgraph "Input Data"
        I1[Email/Password]
        I2[User Role]
        I3[Hospital ID]
    end
    
    subgraph "Processing"
        P1[Validate Credentials]
        P2[Generate Token]
        P3[Set Permissions]
    end
    
    subgraph "Output Data"
        O1[Access Token]
        O2[User Profile]
        O3[Role Permissions]
        O4[Hospital Context]
    end
    
    I1 --> P1
    I2 --> P1
    I3 --> P1
    
    P1 --> P2
    P2 --> P3
    
    P2 --> O1
    P3 --> O2
    P3 --> O3
    P3 --> O4
```

### 2. Patient Data Flow

```mermaid
graph TB
    subgraph "Data Input"
        PI1[Personal Information]
        PI2[Medical History]
        PI3[Guardian Details]
        PI4[Contact Information]
    end
    
    subgraph "Data Processing"
        PP1[Generate Patient Number]
        PP2[Validate Data]
        PP3[Associate with Hospital]
        PP4[Set Status]
    end
    
    subgraph "Data Storage"
        PS1[Patients Table]
        PS2[Patient Records Table]
        PS3[Audit Trail]
    end
    
    subgraph "Data Output"
        PO1[Patient Card]
        PO2[Medical Records]
        PO3[Reports]
    end
    
    PI1 --> PP1
    PI2 --> PP2
    PI3 --> PP3
    PI4 --> PP4
    
    PP1 --> PS1
    PP2 --> PS1
    PP3 --> PS1
    PP4 --> PS1
    
    PS1 --> PO1
    PS1 --> PO2
    PS2 --> PO2
    PS3 --> PO3
```

### 3. Medical Records Data Flow

```mermaid
graph LR
    subgraph "Data Sources"
        DS1[Nurse Notes]
        DS2[Doctor Notes]
        DS3[Pharmacist Notes]
        DS4[Lab Results]
    end
    
    subgraph "Data Processing"
        DP1[Validate Patient]
        DP2[Check Permissions]
        DP3[Format Notes]
        DP4[Update Status]
    end
    
    subgraph "Data Storage"
        DS1[Patient Records]
        DS2[Audit Log]
        DS3[Notifications]
    end
    
    subgraph "Data Access"
        DA1[Role-Based Views]
        DA2[Patient History]
        DA3[Reports]
    end
    
    DS1 --> DP1
    DS2 --> DP2
    DS3 --> DP3
    DS4 --> DP4
    
    DP1 --> DS1
    DP2 --> DS1
    DP3 --> DS1
    DP4 --> DS1
    
    DS1 --> DA1
    DS1 --> DA2
    DS1 --> DA3
```

### 4. Payment Data Flow

```mermaid
graph TB
    subgraph "Payment Initiation"
        PI1[Hospital Selection]
        PI2[Plan Selection]
        PI3[Amount Calculation]
    end
    
    subgraph "Payment Processing"
        PP1[Create Payment Record]
        PP2[Generate Payment URL]
        PP3[Queue Verification]
    end
    
    subgraph "External Integration"
        EI1[Paystack API]
        EI2[Webhook Handling]
        EI3[Status Updates]
    end
    
    subgraph "Data Updates"
        DU1[Payment Status]
        DU2[Subscription Status]
        DU3[Hospital Status]
    end
    
    PI1 --> PP1
    PI2 --> PP2
    PI3 --> PP3
    
    PP1 --> EI1
    PP2 --> EI2
    PP3 --> EI3
    
    EI1 --> DU1
    EI2 --> DU2
    EI3 --> DU3
```

## Key Data Characteristics:

1. **Multi-Tenant Data Isolation**: All data is scoped by hospital_id
2. **Role-Based Data Access**: Different user roles see different data subsets
3. **Real-time Data Updates**: Frontend components reactively update based on API responses
4. **Audit Trail**: All data changes are logged with timestamps and user information
5. **Data Validation**: Multiple layers of validation (frontend, API, database)
6. **Caching Strategy**: Redis cache for frequently accessed data
7. **Background Processing**: Queue system for data-intensive operations
8. **External Integrations**: Payment processing and email notifications 