

# Documento Lista de User Stories
    

## Descrição

Este documento descreve os User Stories criados a partir da Lista de Requisitos no [Documento 001 - Documento de Visão](https://github.com/vitordaniel31/sisvenda/blob/main/docs/doc_visao.md). Este documento também pode ser adaptado para descrever Casos de Uso. Modelo de documento baseado nas características do processo easYProcess (YP).



## Histórico de revisões

| Data       | Versão  | Descrição                          | Autor                          |
| :--------- | :-----: | :--------------------------------: | :----------------------------- |
| 01/12/2022 | 1.0   | Documento inicial  | Ketlly Azevedo de Medeiros (Gerente de Projetos) |



### User Story US01 - Login

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | O ato do administrador de logar-se ao sistema para poder realizar alterações e cadastros. Sempre que um administrador fizer login no sistema, seu acesso será registrado nos logs, para controle das ações realizadas dentro do sistema. |

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
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente.                                   | 
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
| **Descrição** | O ato do administrador fazer o logout do sistema para poder sair do sistema, ou realizar a troca de conta. Sempre que um administrador fizer logout do sistema será registrado nos logs, para controle das ações realizadas dentro do sistema. |

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


### User Story US03 - Manter administrador

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse caso de uso descreve as etapas para o cadastro e exclusão de administradores. Sendo que, o administrador principal será cadastrado diretamente pelos desenvolvedores e este será impossível de excluir. O principal, por sua vez, poderá cadastrar novos administradores, porém, terão acesso limitado, pois apenas o principal pode cadastrar novos administradores. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF03, RF012      | Manter administrador 				|

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
| **TA03.01** | Após fornecer os dados necessários, o administrador principal poderá cadastrar novos administradores, assim que a operação for concluída o sistema registra essa ação nos logs. |
| **TA03.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Assim que a operação for concluída e o administrador devidamente cadastrado, o sistema registra nos logs a conclusão do cadastro. |
| **TA03.03** | Para que seja feita a exclusão de um outro administrador, o principal (único que pode realizar essa operação) busca pelo administrador a ser excluído, clica no botão de excluir e precisará confirmar que deseja excluí-lo. Após terminada a operação, é registrado nos logs que este administrador foi excluído e seu autor. |
| **TA03.04** | Caso o administrador não seja localizado, será exibida uma mensagem pedindo para conferir se os dados estão corretos e em seguida repetir a ação. No caso de estarem certos, verificar se o administrador foi cadastrado no sistema anteriormente. |
| **TA03.05** | Caso o administrador principal feche o sistema antes de confirmar a exclusão do administrador selecionado, o sistema considerará que a exclusão não foi realizada. |


### User Story US04 - Editar dados do administrador


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para a edição de dados de um administrador, quando realizada por ele próprio e pelo administrador principal, este poderá editar dados de outros administradores por ter maior poder de controle do sistema |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF004      | Editar dados do administrador
 				|

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 2h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 10                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira e Ketlly  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Hugo (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA04.01** | Após acessar a página de seu perfil, o administrador poderá realizar a edição dos dados necessários, fornecendo os novos valores e os salvando. Assim que a operação for concluída o sistema registra essa ação nos logs. |
| **TA04.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Assim que a operação for concluída e as informações devidamente salvas, o sistema registra nos logs a conclusão da operação.|
| **TA04.03** | Para que o administrador principal faça a edição de um outro administrador, ele irá buscar pelo usuário que deseja, acessar seu perfil e então clicar no botão de edição de dados, finalmente poderá realizar a edição dos dados necessários, fornecendo os novos valores e os salvando. Assim que a operação for concluída o sistema registra essa ação nos logs.|
| **TA04.04** | Caso o administrador principal digite algum dado incorretamente, o sistema o informará do erro para que seja digitado corretamente. Assim que a operação for concluída e as informações devidamente salvas, o sistema registra nos logs a operação que foi realizada. |
| **TA04.05** | Caso o administrador feche o sistema antes de confirmar a edição dos dados do administrador selecionado, o sistema considerará que a edição não foi realizada. |


### User Story US05 - Manter produtos


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse caso de uso descreve a funcionalidade utilizada para cadastrar novos produtos e editar os que já haviam sido cadastrados, podendo alterar algum dado ou o deixar inativo. Para que a ação seja efetuada, o administrador precisará fornecer nome, descrição e preço. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF005, RF006      | Manter produtos
 				|

|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 6h                             	  | 
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
| **TA05.01** | Após fornecer os dados necessários, o administrador poderá cadastrar novos produtos, assim que a operação for concluída o sistema registra essa ação nos logs. |
| **TA05.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Ou quando o produto já estiver cadastrado, o sistema informará que aquele produto já existe no banco de dados. Assim que a operação for concluída e o produto devidamente cadastrado, o sistema registra nos logs a conclusão do cadastro.|
| **TA05.03** | Para que seja feita a edição de um produto, o administrador busca pelo produto desejado, clica no botão de editar e precisará fornecer os dados a serem atualizados, como também poderá editar o status para ativo/inativo, quando o produto estiver disponível ou quando não for mais vendido. Após confirmar a edição, é registrado nos logs que este administrador foi excluído e seu autor.|
| **TA05.04** | Caso o produto não seja localizado, será exibida uma mensagem pedindo para conferir se os dados estão certos e repetir a ação. E no caso de estarem certos, verificar se o produto já foi cadastrado.|
| **TA05.05** | Caso o usuário feche o sistema antes de confirmar a edição do produto selecionado, o sistema considerará que a edição não foi realizada. |


### User Story US06 - Manter vendas


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve a funcionalidade utilizada para cadastrar e cancelar vendas. Para seu funcionamento, o administrador precisará fornecer os produtos que fazem parte, o valor total, o método de pagamento e a data da venda. Para cancelar, apenas será necessário realizar a busca e confirmar o cancelamento. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF007, RF008      | Manter vendas
 				|

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
| **TA06.01** | Após fornecer os dados necessários, o administrador poderá cadastrar uma nova venda. Assim que a operação for concluída, será gerado a forma de pagamento pelo método escolhido e o sistema registra essa venda nos logs. |
| **TA06.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Ou quando o produto não estiver cadastrado, o sistema informará que aquele produto não existe no banco de dados e assim terá de ser feito o cadastro antes de realizar a venda. Assim que a operação for concluída e o produto devidamente cadastrado, o sistema registra nos logs a conclusão do cadastro.|
| **TA06.03** | Caso no ato do pagamento ocorrer algum erro, a venda ficará como pendente até que o problema seja solucionado e o pagamento confirmado.|
| **TA06.04** | Para que seja feito o cancelamento de uma venda, o administrador busca pela venda em questão, clica no botão de cancelar e então precisará confirmar o cancelamento. Após terminada a operação, é registrado nos logs que a venda foi cancelada e seu autor.|
| **TA06.05** | Caso a venda não seja localizada, será exibida uma mensagem pedindo para conferir se os dados estão certos e repetir a ação. E no caso de estarem certos, verificar se a venda foi iniciada. |
| **TA06.06** | Caso o usuário feche o sistema antes de confirmar o cancelamento da venda selecionada, o sistema considerará que a operação não foi realizada. |

### User Story US07 -  Manter PIX


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve a funcionalidade utilizada para cadastrar, editar e excluir informações relacionadas ao PIX. Para seu funcionamento, o administrador precisará fornecer a chave PIX, o banco da conta |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF011      |  Manter PIX
 				|

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
| **TA07.01** | Após o administrador acessar a página de cadastro do PIX e preencher os dados adequadamente, finaliza a operação e  o sistema exibe uma mensagem de operação bem sucedida. Assim que a operação for concluída, o sistema registra nos logs a conclusão do cadastro. |
| **TA07.02** | Caso o administrador não conclua a ação de cadastro o sistema o redireciona para a tela de PIX cadastrados. Caso seja digitado algum dado incorretamente, o sistema informará o erro para que seja corrigido. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão do cadastro.|
| **TA07.03** | Após o administrador acessar a página de PIX cadastrados e selecionar a que for editar, o administrador fornece as novas informações relacionadas àquela chave e finaliza a operação, com o sistema exibindo uma mensagem de operação bem sucedida. Assim que a operação for concluída, o sistema registra nos logs a conclusão da edição.|
| **TA07.04** | Caso o administrador não conclua a edição, o sistema o redireciona para a tela de PIX cadastrados. Caso seja digitado algum dado incorretamente, o sistema informará o erro para que seja corrigido. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão de edição.|
| **TA07.05** | Após o administrador acessar a página de PIX cadastrados e selecionar a que for desativar, ele terá que confirmar a desativação daquela chave e finalizar a operação, com o sistema exibindo uma mensagem de operação bem sucedida. Assim que a operação for concluída, o sistema registra nos logs a desativação da chave PIX. |
| **TA07.06** | Caso o administrador não confirme a desativação, o sistema o redireciona para a tela de PIX cadastrados. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão de desativação. |

### User Story US08 -  Gerar QR Code do PIX


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse caso de uso descreve as etapas para a geração de QR Code para pagamentos com PIX.  |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF013      |  Gerar QR Code do PIX


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
| **TA08.01** | Após o administrador cadastrar uma venda, conforme o requisitado, e escolher o PIX como forma de pagamento, o sistema gera o QR Code para pagamento com PIX e então verifica se o pagamento foi realizado com sucesso.|
| **TA08.02** | Caso não haja uma venda correspondente àquele pagamento, o usuário será informado de tal erro e será preciso verificar se a venda foi realmente cadastrada. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão do pagamento.|
| **TA08.03** | Caso no ato do pagamento ocorrer algum erro, a venda ficará como pendente até que seja normalizado. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão do pagamento.|


### User Story US09 -  Emitir relatórios


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Com a emissão dos relatórios, será possível observar a venda total de um determinado período, podendo ver os produtos que mais saíram e qual o meio de pagamento mais utilizado. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF009      |  Emitir relatórios


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
| **TA09.01** | Após o administrador acessar a página de emissão de relatórios, ele terá que informar um período para emissão dos relatórios e então o sistema carregará todas as informações desse determinado período. Tais como: valor total, peças mais vendidas e outros dados.|
| **TA09.02** | Caso ele tenha colocado uma data que não ocorreu vendas será retornado uma mensagem informado, ou caso ele coloque uma data inexistente (ex.: 30/02/2005) aparecerá uma mensagem de erro e ele digitará novamente, uma data correta.|

### User Story US10 -  Gerar Conta a Receber para Pagamento


|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | O sistema, quando o administrador finalizar uma venda, irá gerar uma conta a receber. Essa conta terá um ou muitos pagamentos, na qual, cada pagamento será realizado com a forma de pagamento escolhida pelo cliente. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido.|

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF010      |  Gerar Conta a Receber para Pagamento


|                           |                                     |
| ------------------------- | ----------------------------------- | 
| **Prioridade**            | Importante                           | 
| **Estimativa**            | 5h                             	  | 
| **Tempo Gasto (real):**   |                                     | 
| **Tamanho Funcional**     | 10                                  | 
| **Analista**            	| Vitor (responsável por especificar/detalhar o US).                              | 
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  | 
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          | 
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         | 



| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA10.01** | O sistema está gerando uma conta a receber e é possível fazer pagamentos com formas de pagamento diferentes.|
