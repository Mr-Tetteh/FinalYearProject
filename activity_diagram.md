# Activity Diagram - Hospital Management System

## 1. User Login and Authentication Workflow

```mermaid
flowchart TD
    Start([User Access System]) --> A{Valid Session?}
    A -->|Yes| B[Redirect to Dashboard]
    A -->|No| C[Show Login Form]
    
    C --> D[User Enters Credentials]
    D --> E[Validate Input]
    E -->|Invalid| F[Show Error Message]
    F --> C
    
    E -->|Valid| G[Send Login Request]
    G --> H{Authentication Success?}
    H -->|No| I[Show Error Message]
    I --> C
    
    H -->|Yes| J[Generate Access Token]
    J --> K[Store Token in localStorage]
    K --> L[Set User Context]
    L --> M[Set Hospital Context]
    M --> N[Set Role Permissions]
    N --> O[Redirect to Dashboard]
    O --> End([User Logged In])
    
    B --> End
```

## 2. Patient Registration Workflow

```mermaid
flowchart TD
    Start([Start Patient Registration]) --> A[Access Patient Form]
    A --> B[Fill Personal Information]
    B --> C[Fill Medical History]
    C --> D[Fill Guardian Information]
    D --> E[Fill Contact Details]
    
    E --> F{All Required Fields Filled?}
    F -->|No| G[Show Validation Errors]
    G --> B
    
    F -->|Yes| H[Generate Unique Patient Number]
    H --> I[Validate Hospital Access]
    I --> J{Validation Success?}
    J -->|No| K[Show Access Error]
    K --> End([Registration Failed])
    
    J -->|Yes| L[Create Patient Record]
    L --> M[Associate with Hospital]
    M --> N[Set Initial Status]
    N --> O[Save to Database]
    O --> P{Save Success?}
    
    P -->|No| Q[Show Database Error]
    Q --> End
    
    P -->|Yes| R[Show Success Message]
    R --> S[Redirect to Patient List]
    S --> End([Patient Registered])
```

## 3. Medical Record Creation Workflow

```mermaid
flowchart TD
    Start([Start Medical Record]) --> A[Select Patient]
    A --> B{Patient Exists?}
    B -->|No| C[Show Patient Not Found]
    C --> End([Record Creation Failed])
    
    B -->|Yes| D[Check User Permissions]
    D --> E{Has Permission?}
    E -->|No| F[Show Access Denied]
    F --> End
    
    E -->|Yes| G[Select Record Type]
    G --> H{Record Type?}
    
    H -->|Nurse Notes| I[Show Nurse Form]
    H -->|Doctor Notes| J[Show Doctor Form]
    H -->|Pharmacist Notes| K[Show Pharmacist Form]
    H -->|Lab Tech Notes| L[Show Lab Tech Form]
    
    I --> M[Enter Nurse Notes]
    J --> N[Enter Doctor Notes]
    K --> O[Enter Pharmacist Notes]
    L --> P[Enter Lab Tech Notes]
    
    M --> Q[Validate Notes]
    N --> Q
    O --> Q
    P --> Q
    
    Q --> R{Notes Valid?}
    R -->|No| S[Show Validation Errors]
    S --> M
    
    R -->|Yes| T[Create Medical Record]
    T --> U[Update Patient Status]
    U --> V[Save to Database]
    V --> W{Save Success?}
    
    W -->|No| X[Show Database Error]
    X --> End
    
    W -->|Yes| Y[Show Success Message]
    Y --> Z[Redirect to Patient Records]
    Z --> End([Record Created])
```

## 4. Pharmacy Drug Management Workflow

```mermaid
flowchart TD
    Start([Start Drug Management]) --> A{Action Type?}
    
    A -->|Add Drug| B[Show Add Drug Form]
    A -->|Edit Drug| C[Show Edit Drug Form]
    A -->|View Drugs| D[Show Drug List]
    A -->|Update Quantities| E[Show Quantity Update Form]
    
    B --> F[Fill Drug Information]
    F --> G[Validate Drug Data]
    G --> H{Data Valid?}
    H -->|No| I[Show Validation Errors]
    I --> F
    
    H -->|Yes| J[Check Hospital Access]
    J --> K{Access Granted?}
    K -->|No| L[Show Access Error]
    L --> End([Operation Failed])
    
    K -->|Yes| M[Create Drug Record]
    M --> N[Set Hospital Association]
    N --> O[Save to Database]
    
    C --> P[Load Existing Drug Data]
    P --> Q[Modify Drug Information]
    Q --> G
    
    E --> R[Select Drug]
    R --> S[Enter New Quantity]
    S --> T[Validate Quantity]
    T --> U{Quantity Valid?}
    U -->|No| V[Show Quantity Error]
    V --> S
    
    U -->|Yes| W[Update Database]
    W --> O
    
    O --> X{Save Success?}
    X -->|No| Y[Show Database Error]
    Y --> End
    
    X -->|Yes| Z[Show Success Message]
    Z --> AA[Refresh Drug List]
    AA --> End([Operation Completed])
    
    D --> End
```

## 5. Payment Processing Workflow

```mermaid
flowchart TD
    Start([Start Payment Process]) --> A[Select Hospital]
    A --> B[Choose Subscription Plan]
    B --> C[Calculate Amount]
    C --> D[Review Payment Details]
    
    D --> E{Details Correct?}
    E -->|No| F[Modify Details]
    F --> D
    
    E -->|Yes| G[Initiate Payment]
    G --> H[Create Payment Record]
    H --> I[Generate Payment URL]
    I --> J[Redirect to Payment Gateway]
    
    J --> K[User Completes Payment]
    K --> L{Payment Success?}
    L -->|No| M[Show Payment Failed]
    M --> N[Update Payment Status]
    N --> End([Payment Failed])
    
    L -->|Yes| O[Process Payment Confirmation]
    O --> P[Verify Payment with Gateway]
    P --> Q{Verification Success?}
    
    Q -->|No| R[Mark Payment as Pending]
    R --> S[Queue for Manual Review]
    S --> End([Payment Verification Failed])
    
    Q -->|Yes| T[Update Payment Status]
    T --> U[Update Hospital Subscription]
    U --> V[Send Confirmation Email]
    V --> W[Show Success Message]
    W --> X[Redirect to Dashboard]
    X --> End([Payment Completed])
```

## 6. Hospital Registration Workflow

```mermaid
flowchart TD
    Start([Start Hospital Registration]) --> A[Access Registration Form]
    A --> B[Fill Hospital Information]
    B --> C[Fill Contact Details]
    C --> D[Fill Location Information]
    D --> E[Select Subscription Plan]
    
    E --> F{All Fields Valid?}
    F -->|No| G[Show Validation Errors]
    G --> B
    
    F -->|Yes| H[Check Email Availability]
    H --> I{Email Available?}
    I -->|No| J[Show Email Already Exists]
    J --> B
    
    I -->|Yes| K[Create Hospital Record]
    K --> L[Set Default Status]
    L --> M[Create Default Subscription]
    M --> N[Save to Database]
    
    N --> O{Save Success?}
    O -->|No| P[Show Database Error]
    P --> End([Registration Failed])
    
    O -->|Yes| Q[Send Welcome Email]
    Q --> R[Show Registration Success]
    R --> S[Redirect to Login]
    S --> End([Hospital Registered])
```

## Key Workflow Characteristics:

1. **Role-Based Access Control**: Each workflow checks user permissions before proceeding
2. **Multi-Step Validation**: Data validation at multiple levels (frontend, API, database)
3. **Error Handling**: Comprehensive error handling with user-friendly messages
4. **Status Tracking**: All operations maintain proper status tracking
5. **Audit Trail**: All actions are logged for compliance and debugging
6. **Hospital Isolation**: All workflows respect hospital-based data isolation
7. **Real-time Updates**: Frontend components update based on workflow completion
8. **Queue Integration**: Long-running operations use background queues 