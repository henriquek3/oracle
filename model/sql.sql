﻿SELECT
  uf.uf,
  uf.DESCRICAO_UF
FROM uf
ORDER BY uf.uf
SELECT
  cd.SEQ_PLA_CIDADES,
  cd.NOME_CIDADE,
  cd.UF
FROM cidades cd

SELECT
  CL.SEQ_PLA_CLIENTE,
  DECODE(CL.TIPO_CLIENTE, 'J', 'J�ridica', 'F', 'F�sica'),
  CL.NOME_CLIENTE,
  CE.SEQ_PLA_CIDADES
FROM CLIENTES CL, CLIENTES_ENDERECOS CE
WHERE CE.SEQ_PLA_CLIENTE = CL.SEQ_PLA_CLIENTE
      AND ROWNUM <= 25
ORDER BY CL.NOME_CLIENTE
