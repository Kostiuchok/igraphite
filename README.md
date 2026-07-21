# iGraphite — документація проєкту

## Короткий опис

Корпоративний сайт виробника графітової продукції — **igraphite.pl** (Польща).
Двомовний: польська версія за замовчуванням (корінь репозиторію), англійська — у `/en`.
Наразі це **повністю статичний HTML/CSS/JS сайт** (верстка на базі готового шаблону), без CMS
і без бази даних для контенту. Єдина динамічна частина — форма контактів на PHP.

Продакшн: shared-хостинг, домен http://www.igraphite.pl/

## Архітектура

```
/                       — польська версія (за замовчуванням)
  index.html, o-nas.html, kontakt.html, kontakt2.html,
  grafit*.html, zastosawania-*.html (застосування графіту),
  blog*.html, jakosc-i-bezpieczenstwo.html, gatunky_grafitu_pl.html, ...
/en                     — англійська версія, дзеркалить структуру PL-сторінок
  index.html, about-us.html, contacts.html, products*.html,
  applications-*.html, graphite*.html, ...
  посилається на спільні ресурси через ../assets/
/assets                 — спільні статичні ресурси для обох мовних версій
  css/, scss/           — стилі (vendor + власний style.css)
  js/                   — vendor + functions.js (тут AJAX-логіка форми контактів)
  images/, fonts/       — медіа
  docs/                 — прайс-лист (docx/pdf)
  php/                  — contact.php (обробник форми, без SMTP/OAuth) + бандл PHPMailer
  phpmailer_src/        — окрема повна копія репозиторію PHPMailer (vendor/, composer.json) —
                          звідси реально працює "жива" форма (Gmail OAuth2)
/en/assets/php          — копія PHP-обробників для англомовної версії
robots.txt, sitemap.xml — SEO
```

### Форма контактів (важливо)

На сайті одночасно існує кілька обробників форми — це не помилка дублювання,
а різні шляхи відправки:

- **Основний шлях (JS увімкнено):** `assets/js/functions.js` → AJAX POST на
  `https://igraphite.pl/assets/phpmailer_src/index.php` → PHPMailer через Gmail SMTP
  з OAuth2 (XOAUTH2). Refresh-токен зберігається в MySQL
  (`assets/phpmailer_src/class-db.php`).
- **Фолбек (JS вимкнено):** форма `kontakt.html` без AJAX відправляється напряму на
  `assets/phpmailer_src/contact.php` (простий `mail()`, без SMTP/OAuth).
- Є ще схожий `assets/php/contact.php` (через `PHPMailerAutoload`, без SMTP/OAuth) —
  призначення цього дубліката остаточно не з'ясоване, варто перевірити, чи він
  реально використовується.

### Секрети (навмисно НЕ в git)

Ці файли містять **живі** облікові дані (підтверджено власником проєкту) і виключені
через `.gitignore`. На продакшн-сервері вони лишаються без змін, сайт працює як і раніше:

- `assets/php/PHPMailer/get_oauth_token.php`
- `assets/phpmailer_src/get_oauth_token.php`
- `assets/phpmailer_src/index.php`
- `assets/phpmailer_src/class-db.php` — Google OAuth Client ID/Secret + пароль MySQL
  до БД `igraphite`, де зберігається живий refresh-токен Gmail-акаунту
  `tolik.kostyuchok@gmail.com`

⚠️ **TODO:** ротувати ці креденшели (Google Cloud Console + панель хостингу) —
вони довго лежали у відкритому вигляді в коді. GitHub Push Protection зловив
OAuth-секрет автоматично, але MySQL-пароль пройшов би непоміченим.

## Продакшн / хостинг

- Домен: http://www.igraphite.pl/
- Shared-хостинг з підтримкою PHP і MySQL (підтверджено наявністю `mysqli`-з'єднання
  в `class-db.php`)
- Поки не з'ясовано: версія PHP, наявність SSH/Composer, панель керування
  (cPanel/DirectAdmin/Plesk) — це потрібно уточнити перед вибором рушія адмін-панелі,
  оскільки він має обмежити варіанти (наприклад, чи можна ставити Node.js-процеси,
  чи лише PHP).

## Git / GitHub

- Репозиторій: https://github.com/Kostiuchok/igraphite (публічний)
- Гілка `main` — прямий імпорт поточного продакшн-коду (перший комміт)
- Push Protection активний на GitHub — блокує пуш із виявленими секретами

## Як працювати з проєктом

- Сторінки — статичний HTML, редагуються напряму.
- `/assets` спільний для PL і EN: зміни в css/js/images стосуються обох мовних версій
  одночасно. Текстовий контент і розмітку сторінок редагують окремо в корені (PL)
  та в `/en` (EN) — синхронізувати вручну.
- Локальний перегляд: сайт статичний, HTML можна відкривати прямо в браузері;
  для тестування PHP-форми — підняти простий сервер, напр. `php -S localhost:8000`.
- Перед комітом обов'язково перевіряти `git status`/вміст нових файлів на реальні
  секрети (ключі, паролі, токени) — Push Protection ловить не все.

## Завдання (поточний стан)

1. ✅ Підключити проєкт до GitHub
2. ⬜ Ротувати виявлені живі креденшели (Google OAuth + пароль MySQL)
3. ⬜ З'ясувати технічні обмеження shared-хостингу (версія PHP, SSH/Composer, БД,
   панель керування)
4. ⬜ Обрати підхід до побудови адмін-панелі, сумісний зі shared-хостингом
   (кандидати: flat-file PHP CMS на кшталт Bludit/Grav, кастомна легка PHP-адмінка,
   або git-based headless CMS на кшталт Decap CMS)
5. ⬜ Спроєктувати новий обробник форми контактів, що замінить нинішній (той, що
   містить креденшели), інтегрувавши його з майбутньою адмін-панеллю
6. ⬜ Налаштувати процес деплою з GitHub на shared-хостинг (FTP/SFTP чи git-хуки —
   залежно від можливостей хостингу)
