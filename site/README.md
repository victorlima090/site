Quando se usa o XAMMP, ele utiliza um servidor MYSQLY chamado phpmyadmin
Toda a questao de usuario, ela foi feita em um servidor local, então para que as coisas funcionem em qualquer computador
tem que criar uma copia do banco de dados que usei, pra isso tem q seguir os seguintes passos:

1) Entre no phpmyadmin:
Ligue o servidor XAMMP, e o servidor MYSLQ
Vai em um navegador e digita na barra de endereço:http://localhost/phpmyadmin/

2) Na pagina central tem uma barra de navegaçao, entre na barra 'SLQ', que esta entre a barra 'Banco de dados' e ' Status'
3)Copie e cole o seguinte codigo:
CREATE DATABASE Nafisio;
CREATE TABLE users (user VARCHAR(40), username VARCHAR(40), pw VARCHAR(40));
INSERT INTO users (user,username,pw) VALUES ('victor090','Victor Lima','senha123');
INSERT INTO users (user,username,pw) VALUES ('tccdestroyer','Lorenna Malaquias','senhasecreta');
INSERT INTO users (user,username,pw) VALUES ('whitelobo','Joao das Neves','102030');
 Clique em executar, do lado direto no meio da pagina

Pronto, voce acabou de criar um banco de dados com 3 usuarios, voce pode adicionar mais usuarios a medida que vai programando
mas saiba que outras pessoas nao poderao ter acesso a eles.