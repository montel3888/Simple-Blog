<br>
<table class="table table-bordered table-striped">
  <thead class="thead-inverse"><!-- add class="thead-inverse" for a dark header -->
    <tr>
      <th>ID товара</th>
      <th>Имя товара</th>
      <th>Описание</th>
      <th class="sorter-false filter-false">Инфо</th>
    </tr>					
  </thead>
  <tfoot>
    <tr>
      <th>ID товара</th>
      <th>Имя товара</th>
      <th>Описание</th>
      <th class="sorter-false filter-false">Инфо</th>
    </tr>
    <tr>
      <th colspan="3" class="ts-pager">
        <div class="form-inline">
          <div class="btn-group btn-group-sm mx-1" role="group">
            <button type="button" class="btn btn-secondary first" title="first">⇤</button>
            <button type="button" class="btn btn-secondary prev" title="previous">←</button>
          </div>
          <span class="pagedisplay"></span>
          <div class="btn-group btn-group-sm mx-1" role="group">
            <button type="button" class="btn btn-secondary next" title="next">→</button>
            <button type="button" class="btn btn-secondary last" title="last">⇥</button>
          </div>
          <select class="form-control-sm custom-select px-1 pagesize" title="Select page size">
            <option selected="selected" value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="all">All Rows</option>
          </select>
          <select class="form-control-sm custom-select px-4 mx-1 pagenum" title="Select page number"></select>
        </div>
      </th>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ( $products as $product ): ?>    
        <tr id="row<?= $product['id'] ?>">
            <td>Товар №<?= htmlspecialchars( $product['id'] )?></td>
            <td><?= htmlspecialchars( $product['product'] )?></td>
            <td><?php 
                $small = substr( $product['description'] , 0, 80);
                echo $small ?>
            </td>                           
            <td>
               <a href="admin/admin/view?id=<?= $product['id'];?>"><i class="fa fa-pencil"></i></a>
               <a href="#"><i title="Delete Project" class="fa fa-trash fa-lg link_del" data-id3="<?= $product['id']; ?>"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table> 
<script type="text/javascript" src="/js/table.js"></script>
<script type="text/javascript">
$(function(){
  $('.link_del').click(function(){
    var id = $(this).data('id3');
    $.ajax({
        url: 'admin/admin/delete',
        type: 'post',
        data: {'id': id},
        success: function(data){
            alert("Project is deleted. Thank You!");
            $("#row"+id).slideUp('slow',function(){$(this).remove();});
            console.log(data);
        },
        error:function(){
            alert('Error');
        }
    });
  });  
});
</script>