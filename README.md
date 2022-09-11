<p align="center">Foram  utilizados: Laravel 8, Breeze, o pacote tymon/jwt-auth para 
autenticação dos clientes via JWT, SGBD MySQL e Insomnia (ferramenta para testar os endpoints)</p>

<p align="center">
Os seguintes endpoints foram criados:

http://127.0.01:8000/api/register (para cadastrar os clientes na tabela customers):

JSON com os dados a serem criados (exemplo) 
{
	"name": "Cliente 10",
	"email": "cliente10@teste.com.br",
	"password":"123456",
	"phone": "51000000000"
}

Retorno em caso de sucesso:
{
	"success": true,
	"message": "Cliente cadastrado com sucesso",
	"data": {
		"name": "Cliente 2",
		"email": "cliente2@teste.com.br",
		"password": "$2y$10$0njpDZkipSF..nwCTPkGEuVu7OFBoQAxE66NUZDHte367tNTpLr.y",
		"phone": "51000000000",
		"updated_at": "2022-09-11T08:34:15.000000Z",
		"created_at": "2022-09-11T08:34:15.000000Z",
		"id": 5
	}
}


http://127.0.01:8000/api/login (efetuar login do cliente):

JSON com os dados de login (exemplo):
{
	"email": "cliente10@teste.com.br",
	"password": "123456"
	
}
Retorno em caso de sucesso:
{
	"success": true,
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTY2Mjg4NTI4MiwiZXhwIjoxNjYyODg4ODgyLCJuYmYiOjE2NjI4ODUyODIsImp0aSI6IjIyaldXVkpRWVZpWEllNjYiLCJzdWIiOjUsInBydiI6IjFkMGEwMjBhY2Y1YzRiNmM0OTc5ODlkZjFhYmYwZmJkNGU4YzhkNjMifQ.8T_taDiBAU5sT0BXelgcKv8FGW9WJxHNayxapA-EXAE"
}


http://127.0.01:8000/api/create (cadastrar pedidos dos clientes):

O token gerado quando o cliente faz login deve ser passado como Bearer Token (autenticação)

JSON com os dados do pedido (exemplo):
{
	"delivery_date": "2022-09-12",
	"freight_value": 10.99,
	"order_description":"DESCRIÇÃO DO PEDIDO DO CLIENTE 10"
		
}

Retorno em caso de sucesso:
{
	"success": true,
	"message": "Pedido cadastrado com sucesso",
	"data": {
		"delivery_date": "2022-09-12",
		"freight_value": 10.99,
		"order_description": "DESCRIÇÃO DO PEDIDO DO CLIENTE 10",
		"customer_id": 6,
		"updated_at": "2022-09-11T08:56:33.000000Z",
		"created_at": "2022-09-11T08:56:33.000000Z",
		"id": 4
	}
}

</p>

## Como executar os endpoints e listar os pedidos

<p align="center">Para executar os endpoints deve-se:
1-) Rodar as migrations para criar as tabelas
2-) Na raiz do sistema executar o comando php artisan serve 
3-) Executar os endpoints no Postman on Insomnia (testei no Insomnia)
4-) Acessar http://127.0.0.1:8000/pedidos/listar para listar todos os pedidos de todos os clientes

</p>

