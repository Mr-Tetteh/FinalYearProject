# Sequence Diagram - Hospital Management System

## 1. User Authentication Flow

```mermaid
sequenceDiagram
    participant U as User
    participant F as Frontend (Vue.js)
    participant A as API Gateway
    participant C as Auth Controller
    participant DB as Database
    participant S as Sanctum

    U->>F: Enter credentials
    F->>A: POST /api/login
    A->>C: login()
    C->>DB: Validate user credentials
    DB-->>C: User data
    C->>S: Generate token
    S-->>C: Access token
    C-->>A: Token + user data
    A-->>F: Authentication response
    F->>F: Store token in localStorage
    F->>F: Set user role & hospital_id
    F-->>U: Redirect to dashboard
```

## 2. Patient Registration Flow

```mermaid
sequenceDiagram
    participant R as Receptionist
    participant F as Frontend
    participant A as API Gateway
    participant PC as Patient Controller
    participant DB as Database
    participant H as Hospital System

    R->>F: Fill patient form
    F->>A: POST /api/add_patient
    A->>PC: store()
    PC->>PC: Generate unique patient number
    PC->>DB: Insert patient record
    DB-->>PC: Patient ID
    PC->>H: Associate with hospital
    PC-->>A: Success response
    A-->>F: Patient created
    F-->>R: Success notification
```

## 3. Medical Record Creation Flow

```mermaid
sequenceDiagram
    participant S as Staff (Nurse/Doctor)
    participant F as Frontend
    participant A as API Gateway
    participant PRC as Patient Record Controller
    participant DB as Database
    participant P as Patient System

    S->>F: Select patient & add notes
    F->>A: POST /api/patient_rec
    A->>PRC: store()
    PRC->>P: Validate patient exists
    P-->>PRC: Patient valid
    PRC->>DB: Insert medical record
    DB-->>PRC: Record ID
    PRC->>DB: Update patient status
    PRC-->>A: Record created
    A-->>F: Success response
    F-->>S: Record saved notification
```

## 4. Pharmacy Drug Management Flow

```mermaid
sequenceDiagram
    participant P as Pharmacist
    participant F as Frontend
    participant A as API Gateway
    participant PH as Pharmacy Controller
    participant DB as Database
    participant H as Hospital System

    P->>F: Add/edit drug information
    F->>A: POST/PATCH /api/pharmacy
    A->>PH: store()/update()
    PH->>H: Validate hospital access
    H-->>PH: Access granted
    PH->>DB: Insert/update drug
    DB-->>PH: Drug ID
    PH->>DB: Update inventory
    PH-->>A: Drug saved/updated
    A-->>F: Success response
    F-->>P: Drug management complete
```

## 5. Payment Processing Flow

```mermaid
sequenceDiagram
    participant A as Account Staff
    participant F as Frontend
    participant A as API Gateway
    participant PC as Payment Controller
    participant P as Paystack API
    participant DB as Database
    participant Q as Queue System

    A->>F: Initiate payment
    F->>A: POST /api/payment
    A->>PC: processPayment()
    PC->>P: Create payment request
    P-->>PC: Payment URL
    PC->>DB: Store payment record
    PC->>Q: Queue payment job
    PC-->>A: Payment URL
    A-->>F: Redirect to payment
    F-->>A: Payment completed
    Q->>P: Verify payment
    P-->>Q: Payment status
    Q->>DB: Update payment status
```

## 6. Hospital Registration Flow

```mermaid
sequenceDiagram
    participant H as Hospital Admin
    participant F as Frontend
    participant A as API Gateway
    participant HC as Hospital Controller
    participant DB as Database
    participant S as Subscription System

    H->>F: Fill hospital registration form
    F->>A: POST /api/hospital
    A->>HC: store()
    HC->>DB: Insert hospital record
    DB-->>HC: Hospital ID
    HC->>S: Set default subscription
    S-->>HC: Subscription created
    HC->>DB: Update hospital status
    HC-->>A: Hospital registered
    A-->>F: Registration success
    F-->>H: Hospital created notification
```

## Key System Interactions:

1. **Authentication & Authorization**: Laravel Sanctum handles token-based authentication
2. **Role-Based Access Control**: Frontend validates user roles before API calls
3. **Multi-Tenant Architecture**: All operations are scoped to user's hospital
4. **Queue System**: Background jobs handle payment verification and patient deactivation
5. **API-First Design**: All frontend operations go through RESTful API endpoints
6. **Data Validation**: Both frontend and backend validate data integrity
7. **Real-time Updates**: Frontend components reactively update based on API responses 