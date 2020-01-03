# Dir-Class

## Inclusão da Classe

```php
include_once "diretorio/Dir.class.php";
```

## Chamada da Classe

```php
$dir = new Dir();
```

### Listando diretórios

Define o PATH para a listagem com as configurações padrões.

```php
$dados = $dir->listMethod("/PATH/");
```

Após informar o PATH desejado para ser listado, pode-se informar como segundo parâmetro 2 tipos de listagem:

Parâmetro   | Descrição
------------|--------------------------------------------------
THIS_FOLDER | Lista apenas o conteúdo da pasta atual
SUB_FOLDERS | Lista o conteúdo da pasta atual e suas sub-pastas

```php
$dados = $dir->listMethod("/PATH/", "TIPO_DE_LISTAGEM");
```
Como padrão a listagem vem configurada para mostrar arquivos e pastas, mas você pode mudar isso no terceiro parâmetro (chamado Modo de Listagem):

Parâmetro   | Descrição
------------|--------------------------------------------------
FILE_ONLY   | Lista apenas arquivos
FOLDER_ONLY | Lista apenas pastas
LIST_ALL    | Lista arquivos e pastas

```php
$dados = $dir->listMethod("/PATH/", "TIPO_DE_LISTAGEM", "MODO_DE_LISTAGEM");
```

O retorno contido em **$dados** será um array com as informações da listagem:

```php
Array(
	["PASTA_PAI"] => Array(
		[0] => "ARQUIVO1.txt",
		[1] => "ARQUIVO2.txt",
		[2] => "ARQUIVO3.txt"
	),
	["PASTA_IRMA"] => Array(
		["PASTA_FILHA"] => Array(
			[0] => "ARQUIVO4.txt"
		)
	),
);
```

Aproveitem!!!
