<?php

class Resume {
    private $experience;
    private $skills;
    private $education;
    private $additionalInfo;

    public function __construct($experience, $skills, $education, $additionalInfo = '') {
        $this->experience = $experience;
        $this->skills = $skills;
        $this->education = $education;
        $this->additionalInfo = $additionalInfo;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function getEducation() {
        return $this->education;
    }

    public function getAdditionalInfo() {
        return $this->additionalInfo;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
    }

    public function setEducation($education) {
        $this->education = $education;
    }

    public function setAdditionalInfo($additionalInfo) {
        $this->additionalInfo = $additionalInfo;
    }
}

class User {
    private $firstName;
    private $lastName;
    private $login;
    private $password;
    private $birthDate;
    private $avatar;
    private $resumes = [];

    public function __construct($firstName, $lastName, $login, $password, $birthDate, $avatar) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->birthDate = $birthDate;
        $this->avatar = $avatar;
    }

    public function addResume($experience, $skills, $education, $additionalInfo = '') {
        $resume = new Resume($experience, $skills, $education, $additionalInfo);
        $this->resumes[] = $resume;
    }

    public function getResumes() {
        return $this->resumes;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }
}

// Пример использования:
$user = new User('Иван', 'Иванов', 'ivanov', 'securepassword', '1990-01-01', 'avatar.jpg');

// Добавляем резюме пользователю
$user->addResume(
     null,
    'Навыки: PHP, JavaScript, SQL',
    'Образование: Университет IT',
    'Дополнительная информация: Сертификаты и курсы'
);

// Получаем резюме пользователя
foreach ($user->getResumes() as $resume) {
   # echo 'Опыт: ' . $resume->getExperience() . PHP_EOL;
    echo 'Навыки: ' . $resume->getSkills() . PHP_EOL;
    echo 'Образование: ' . $resume->getEducation() . PHP_EOL;
    echo 'Дополнительно: ' . $resume->getAdditionalInfo() . PHP_EOL;
}
?>
