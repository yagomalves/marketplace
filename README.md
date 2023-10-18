Kauã: Trabalhando na UI (Parte interativa) das páginas já adicionadas.
Yago: atualmente trabalhando na página adSolo.php que consiste em exibir os anúncios individualmente, tanto para atualizar, quanto para excluir.

--------------------------------------------------------------------------

Banco de dados: ooplogin

users:
-users_id INT 255 AUTO_INCREMENT
-user_email VARCHAR 255
-user_pwd VARCHAR 255
-user_first_name VARCHAR 255
-user_last_name VARCHAR 255
-user_phone INT 11
-user_signup_date DATETIME

ad:
-ad_id INT AUTO_INCREMENT
-ad_title VARCHAR 255
-ad_description TEXT
-ad_type VARCHAR 255
-users_id INT REFERENCES users(users_id)
-ad_date DATETIME

profiles:
-profiles_id INT AUTO_INCREMENT
-profiles_about TEXT
-profiles_introtitle TEXT
-profiles_introtext TEXT
users_id INT REFERENCES users(users_id)

pwdreset:
-pwdResetEmail TEXT
-pwdResetSelector TEXT
-pwdResetToken LONGTEXT
-pwdResetExpires TEXT
-pwdResetId INT AUTO_INCREMENT

