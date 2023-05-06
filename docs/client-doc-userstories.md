
# Documento Lista de User Stories
    

## Descrição

Este documento descreve os User Stories criados a partir da Lista de Requisitos no [Documento 001 - Documento de Visão](https://github.com/vitordaniel31/sisvenda/blob/main/docs/doc_visao.md). Este documento também pode ser adaptado para descrever Casos de Uso. Modelo de documento baseado nas características do processo easYProcess (YP).



## Histórico de revisões

| Data       | Versão  | Descrição                          | Autor                          |
| :--------- | :-----: | :--------------------------------: | :----------------------------- |
| 01/12/2022 | 1.0   | Documento inicial  | Ketlly Azevedo de Medeiros (Gerente de Projetos) |


### User Story US00 - Manter gerentes

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para a criação, listagem, edição e exclusão de dados de um usuário, quando requisitado pelo administrador. Sendo que, o administrador será cadastrado diretamente pelos desenvolvedores, este será impossível de excluir. O administrador, por sua vez, poderá cadastrar novos gerentes, porém, terão acesso limitado, pois apenas o administrador pode cadastrar novos gerentes. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF003, RF004, RF005, RF006  | Manter gerentes 				|

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 5h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 20                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira e Ketlly (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Hugo  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA00.01** | Após fornecer os dados necessários, o administrador poderá cadastrar novos gerentes, assim que a operação for concluída o sistema registra essa ação nos logs. |
| **TA00.02** | Caso o administrador digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Assim que a operação for concluída e o administrador devidamente cadastrado, o sistema registra nos logs a conclusão do cadastro. |
| **TA00.03** | Para que seja feita a exclusão de um gerente, o administrador (único que pode realizar essa operação) busca pelo gerente a ser excluído, clica no botão de excluir e precisará confirmar que deseja excluí-lo. Após terminada a operação, é registrado nos logs que este gerente foi excluído e seu autor. |
| **TA00.04** | Caso o gerente não seja localizado, será exibida uma mensagem pedindo para conferir se os dados estão corretos e em seguida repetir a ação. No caso de estarem certos, verificar se o gerente foi cadastrado no sistema anteriormente. |
| **TA00.05** | Caso o administrador feche o sistema antes de confirmar a exclusão do gerente selecionado, o sistema considerará que a exclusão não foi realizada. |
| **TA00.06** | Após acessar a página de seu perfil, o administrador poderá realizar a edição dos dados necessários, fornecendo os novos valores e os salvando. Assim que a operação for concluída o sistema registra essa ação nos logs. |
| **TA00.07** | Para que o administrador faça a edição de um gerente, ele irá buscar pelo usuário que deseja, acessar seu perfil e então clicar no botão de edição de dados, finalmente poderá realizar a edição dos dados necessários, fornecendo os novos valores e os salvando. Assim que a operação for concluída o sistema registra essa ação nos logs.|



### User Story US01 - Login

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | O sistema terá uma tela de login para o usuário entrar e realizar operações. O login será feito com email e senha. E terá a possibilidade de recuperar a senha. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF001  | Login 				|

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Essencial                           | 
| **Estimativa**            | 2h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 5                                    | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira e Ketlly (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente.)                                   | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração)                                   | 
| **Testador**              |  Hugo  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                                   | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA01.01** | O usuário informa, na tela de login, email e senha, que ao clicar em Login ele é redirecionado para a página de acesso e o sistema registra essa ação nos logs. |
| **TA01.02** | O usuário informa, na tela de login, email e senha incorretos, ao clicar em Login será retornada uma mensagem alertando que a senha está incorreta, ele poderá digitar novamente ou utilizar a opção Esqueci a Senha, para modificar sua senha e tentar login novamente. |
| **TA01.03** | O sistema informará ao usuário caso tente realizar login com algum campo em branco, o alerta será no campo que estiver em branco. Mensagem: Campo necessário não informado. |


### User Story US02 - Logout

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | O sistema terá um botão para quando o usuário quiser encerrar sua sessão. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF002      | Logout 				|

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 1h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 5                                    | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira (responsável por implementar e realizar testes de unidade e testes de integração). 
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                   | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                                   | 
| **Testador**              |  Hugo  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                                 | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA02.01** | Após clicar no botão "sair/logout"o sistema deve ir para a página inicial de login. O sistema registra essa ação nos logs. |
| **TA02.02** | Caso o usuário feche o navegador ao invés de realizar o logout, o sistema manterá seu login efetuado. |


### User Story US03 - Produtos


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para a criação, listagem ou exclusão dos produtos, podendo e editar os que já haviam sido cadastrados, alterar algum dado ou o deixar inativo. Para que a ação seja efetuada, o administrador ou o gerente precisará fornecer código, nome, descrição e preço. |

| **Requisitos envolvidos** |                                                   |
| -------------     | :------------------------------------------------------------- |
| RF007, RF008, RF009, RF010      |  Produtos
 				

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 6h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 20                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira e Ketlly (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente).                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Hugo  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA03.01** | Após fornecer os dados necessários, o usuário poderá cadastrar novos produtos, assim que a operação for concluída o sistema registra essa ação nos logs. |
| **TA03.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Ou quando o produto já estiver cadastrado, o sistema informará que aquele produto já existe no banco de dados. Assim que a operação for concluída e o produto devidamente cadastrado, o sistema registra nos logs a conclusão do cadastro.|
| **TA03.03** | Para que seja feita a edição de um produto, o usuário busca pelo produto desejado, clica no botão de editar e precisará fornecer os dados a serem atualizados, como também poderá editar o status para ativo/inativo, quando o produto estiver disponível ou quando não for mais vendido. Após confirmar a edição, é registrado nos logs a edição do produto.|
| **TA03.04** | Caso o produto não seja localizado, será exibida uma mensagem pedindo para conferir se os dados estão certos e repetir a ação. E no caso de estarem certos, verificar se o produto já foi cadastrado.|
| **TA03.05** | Caso o usuário feche o sistema antes de confirmar a edição do produto selecionado, o sistema considerará que a edição não foi realizada. |


### User Story US04 - Produtos vendas


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para cadastrar, listar, cancelar ou editar vendas. O administrador ou gerente precisará fornecer as informações relacionadas a venda. Para cancelar, apenas será necessário realizar a busca e confirmar o cancelamento.

 

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF011, RF012, RF013, RF014, RF015      | Produtos vendas
 				

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 6h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 20                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA04.01** | Após fornecer os dados necessários, o usuário poderá cadastrar uma nova venda. Assim que a operação for concluída, será gerado a forma de pagamento pelo método escolhido e o sistema registra essa venda nos logs. |
| **TA04.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Ou quando o produto não estiver cadastrado, o sistema informará que aquele produto não existe no banco de dados e assim terá de ser feito o cadastro antes de realizar a venda. Assim que a operação for concluída e o produto devidamente cadastrado, o sistema registra nos logs a conclusão do cadastro.|
| **TA04.03** | Caso no ato do pagamento ocorrer algum erro, a venda ficará como pendente até que o problema seja solucionado e o pagamento confirmado.|
| **TA04.04** | Para que seja feito o cancelamento de uma venda, o usuário busca pela venda em questão, clica no botão de cancelar e então precisará confirmar o cancelamento. Após terminada a operação, é registrado nos logs que a venda foi cancelada e seu autor.|
| **TA04.05** | Caso a venda não seja localizada, será exibida uma mensagem pedindo para conferir se os dados estão certos e repetir a ação. E no caso de estarem certos, verificar se a venda foi iniciada. |
| **TA04.06** | Caso o usuário feche o sistema antes de confirmar o cancelamento da venda selecionada, o sistema considerará que a operação não foi realizada. |

### User Story US05 -  Pagamento


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve passo passo o pagamento, após selecionar a forma de pagamento de uma venda. Quando o usuário finalizar uma venda e escolher a forma de pagamento, irá gerar uma conta a receber, para que o cliente realize o pagamento, seja com uma ou mais formas, e assim, confirme o sucesso daquela venda. Cada um pagamento poderá ser feito com uma forma de pagamento. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF016, RF017    |  Pagamento
 				

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 3h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 5                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA05.01** | O sistema está gerando uma conta a receber  |
| **TA05.02** | Após o usuário finalizar o pagamento, todos os dados serão adicionados no log junto com o agente. |
| **TA05.03** | Caso o usuário encerre o processo sem finalizar. O pagamento será cancelado e todos os dados serão adicionados no log junto com o agente. |



### User Story US06 -  Forma de pagamento


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve passo passo a forma de pagamento, após a finalização de uma venda. Quando o usuário finalizar uma venda, irá gerar uma conta a receber, para que o cliente realize a selação da forma de pagamento, seja com uma ou mais formas, e assim, confirme o sucesso daquela venda. Cada conta a receber, terá um ou muitos registros de pagamento e um pagamento poderá ser feito com uma forma de pagamento. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido.   |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF018, RF019, RF020, RF021      |  Forma de pagamento


|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 3h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 5                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA06.01** | O sistema está gerando uma conta a receber e é possível fazer pagamentos com formas de pagamento diferentes. |
| **TA06.02** | Caso o usuário escolha uma opção inválida, irá aparecer uma mensagem de erro.|
| **TA06.03** | Após o usuário escolher por uma opção válida, será gerado o caminho correto para a finalização e conclusão do pagamento. |
| **TA06.04** | Caso o usuário escolha uma opção e precise por alterar, será exibido a opção de troca do método. |
| **TA06.05** | Caso o usuário encerre o processo sem finalizar. O pagamento será cancelado e todos os dados serão adicionados no log junto com o agente. |



### User Story US07 -   Relatórios


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Com a emissão dos relatórios, será possível observar a venda total de um determinado período, podendo ver os produtos que mais saíram e qual o meio de pagamento mais utilizado. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF022, RF023, RF024, RF025      |  Relatórios


|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 3h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 10                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA07.01** | Após o administrador acessar a página de emissão de relatórios, ele terá que informar um período para emissão dos relatórios e então o sistema carregará todas as informações desse determinado período. Tais como: valor total, peças mais vendidas e outros dados.|
| **TA07.02** | Caso ele tenha colocado uma data que não ocorreu vendas será retornado uma mensagem informado, ou caso ele coloque uma data inexistente (ex.: 30/02/2005) aparecerá uma mensagem de erro e ele digitará novamente, uma data correta.|
