# School management for turkmen schools
#### Originally cloned from https://github.com/sanz/laravel-school-management-system, but improved and changed for turkmen education systems.

> It was a private repo, and app is used by the real school, but now I'm making it public for anyone wishing to benefit from it. 

#### Functionalities
- Lessons
- Classess
- Users Management
- Timetables,
- Journals (based on timetable)
-  Attendance
- Roles Management (default: admin, teacher, student, parent)
- Chatting
- Monotiring (logging, resource creation, etc...)

## Installation
```bash 
# Install brew
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

# Install php and mysql (optionally sqlite or psql)
brew install php@7.4
brew install mysql

git clone https://github.com/nurmuhammet-ali/school.git
cd school
cp .env.example .env
composer install
php artisan key:generate

vim .env
DB_DATABASE_FOR_TRACKER=try_tracker
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=school_management_system
DB_USERNAME=root
DB_PASSWORD=
```

> Setup database (example below)
```sql
# Create database
create database school_management_system;

# Create user
CREATE USER 'school_user'@'%' IDENTIFIED BY 'strong_unbreakable_password';
GRANT ALL PRIVILEGES ON *.* TO 'school_user'@'%' WITH GRANT OPTION;
CREATE USER 'school_user'@'localhost' IDENTIFIED BY 'strong_unbreakable_password';
GRANT ALL PRIVILEGES ON *.* TO 'school_user'@'localhost' WITH GRANT OPTION;
```

> To setup chatting functionality, setup pusher.js follow https://chatify.munafio.com/installation docs.
> Database migration
```bash
php artisan migrate --seed
```

# That's it, :)
