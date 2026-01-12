# ScheduleIt - Guia de Instalação e Uso

## Requisitos
Para executar o ScheduleIt em sua própria máquina, siga os passos abaixo:

1. Instale o [XAMPP](https://www.apachefriends.org/index.html).
2. Inicie o XAMPP e ative os serviços **Apache** e **MySQL**.
3. Acesse o phpMyAdmin em [127.0.0.1/phpmyadmin](http://127.0.0.1/phpmyadmin).
4. Importe o banco de dados localizado em `scheduleit/scheduleit/resources/scheduleit.sql`.
5. A página inicial do site está em `scheduleit/scheduleit/view/pages/home`.

## Sobre o ScheduleIt
O ScheduleIt é um sistema de agendamentos voltado para estabelecimentos, consultórios e pequenos negócios. Ele permite a gestão de usuários e salas virtuais, onde funcionários podem ser cadastrados e agendas podem ser gerenciadas.

![agenda](https://github.com/user-attachments/assets/841f2eae-e802-453a-8573-6cae72283dbb)


### Funcionalidades
- **Usuários** podem ser:
  - Funcionários de salas criadas.
  - Donos de suas próprias salas.
  - Gerenciar sua agenda bloqueando e desmarcando horários.
- **Salas Virtuais** podem ser cadastradas e gerenciadas pelos usuários.
- **Notificações** são enviadas para os funcionários ao receberem agendamentos.
- **Agenda** acessível diretamente pelo perfil do usuário.

## Como Cadastrar uma Sala
1. Clique na imagem do seu perfil no canto superior direito e selecione **"Minhas Salas"**.
2. Clique no botão **"+ Adicionar Sala"** para cadastrar uma nova sala.
3. A sala cadastrada **não será publicada automaticamente**.
4. Para gerenciá-la, acesse novamente **"Minhas Salas"**.
5. Para adicionar funcionários:
   - Clique em **"+ Adicionar Funcionário"**.
   - Insira o **CPF** do usuário que será funcionário.
6. Para publicar a sala e torná-la visível para outros usuários, clique em **"Publicar"** ao lado da imagem do estabelecimento.

## Pagamento (Ainda não implementado)
A página de pagamento contém:
- **Plano**
- **Forma de Pagamento**
- **Campo para Cupons**

## Contas de Teste
Se estiver tendo problemas, utilize a conta de administrador:
- **Usuário:** admin
- **Senha:** 123  
Essa conta possui uma sala cadastrada ainda não publicada.  

Outras contas cadastradas:
- **Usuário:** walter@gmail.com
- **Usuário:** jesse@gmail.com
- **Senha:** 123

## Estrutura do Projeto
O código está organizado da seguinte forma:
- **View** - Contém os arquivos responsáveis pela interface do usuário (HTML, CSS, JS).
- **Model** - Responsável pela interação com o banco de dados (DAO).
- **Controller** - Manipula as requisições HTTP (POST, GET) e interage com a View e o Model.

Este README tem como objetivo facilitar a instalação e o uso do ScheduleIt. Caso tenha dúvidas ou precise de suporte, entre em contato com o desenvolvedor.
