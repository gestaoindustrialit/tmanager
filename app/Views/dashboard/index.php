<div class='row g-3'><?php foreach(['Encomendas Abertas','Produções em Curso','Vendas Mês','Custo Mês','Margem','Tarefas Pendentes','Auditorias em Atraso','Alertas Críticos'] as $k): ?><div class='col-md-3'><div class='card shadow-sm'><div class='card-body'><small><?=e($k)?></small><h4>0</h4></div></div></div><?php endforeach; ?></div>
<canvas id='kpiChart' class='mt-4'></canvas>
<script>new Chart(document.getElementById('kpiChart'),{type:'bar',data:{labels:['Jan','Fev','Mar'],datasets:[{label:'Vendas',data:[10,20,15]}]}});</script>
