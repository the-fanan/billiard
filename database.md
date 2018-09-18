#This contains documentation on the database tables
All tables contain `created_at` and `updated_at` columns.
### users - holds frequently requested and constant data about user
- id
- fullname
- email
- password
- dob
- phone
- status - enum [enabled,disabled,pending,deleted]
- email_verification - enum [0,1]
### user_attributes - holds meta data about user
- id
- user_id - references `id` on users table
- attribute
- value
### items - holds frequently requested and constant data about user
- id
- type - shoe, bag, laptop, furniture or whatnot. we want the app to be exensible in the future.
- brand - apple, ikea, honda et al.
- model
- tag - unique id for item
- problem
- owner - references `id` on users table
- due_date
- checked_in
- checked_out
### item_attributes
- id
- item_id - references `id` on items table
- attribute
- value
### repair_requests - holds data about devices to be fixed, who is to fix, device fix status and if the fix has been confirmed
- id
- item_id - references `id` on items table
- technician
- reviewer
- technician_fix_confirmation
- reviewer_fix_confirmation
- status - enum [fixed, pending]
### action_trails - tracks actions performed on app to increase accountability on items use
- id
- doer - references `id` on users table
- action - (related to the permissions)
- item_id - references `id` on users table ,  nullable
- receiver - references `id` on users table, nullable
### payments - would be left alon for now
- id
- item_id
- subscription_id - nullable
- payment_method
- amount
### Roles and Permisions
roles and permissions table will be created using spatie/laravel-permissions  
roles that will be included are : super-admin, admin, technician, customer, reviewer
permissions included are :
- CRUD-admin => create-admin, Update-admin, delere-admin
- CRUD-technician
- CRUD-item
- CRUD-customer
- update-fix
- check-in
- check-out
- mark-as-payed
