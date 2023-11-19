-- A) Consulta para obter informações do cliente
SELECT
    nome_cliente AS Nome,
    cpf_cliente AS CPF,
    rg_cliente AS RG,
    telmask_cliente AS Telefone,
    email_cliente AS 'E-mail do cliente'
FROM
    clientes;

-- B) Quantidade de compras concluídas por cliente com a foto do perfil
SELECT
    c.id_cliente AS 'ID do Cliente',
    cl.nome_cliente AS Nome,
    COUNT(c.id_compra) AS 'Quantidade de Compras',
    f.url_foto AS 'Foto do Perfil'
FROM
    clientes cl
JOIN
    compras c ON cl.id_cliente = c.id_cliente
LEFT JOIN
    fotos f ON cl.id_cliente = f.id_cliente AND f.ordem_foto = 1
WHERE
    c.sel_status_compra = 'concluido'
GROUP BY
    c.id_cliente, cl.nome_cliente, f.url_foto;



