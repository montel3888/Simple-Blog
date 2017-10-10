$(function () {
    $('#main_tbl').tablesorter({
        widthFixed : true,
        showProcessing: true,
        headerTemplate : '{content} {icon}', // Add icon for various themes

        widgets: [ 'zebra', 'stickyHeaders', 'filter' ],

        widgetOptions: {
          stickyHeaders : '',
          stickyHeaders_offset : 0,
          stickyHeaders_cloneId : '-sticky',
          stickyHeaders_addResizeEvent : true,
          stickyHeaders_includeCaption : true,
          stickyHeaders_zIndex : 2,
          stickyHeaders_attachTo : null,
          stickyHeaders_xScroll : null,
          stickyHeaders_yScroll : null,
          stickyHeaders_filteredToTop: true
        }
    });
    $('#send').click(function(){
        $.ajax({
            url: 'main/status',
            type: 'post',
            data: {'project_id': 17050001},
            success: function(data){
                console.log(data);
            },
            error:function(){
                alert('Error');
            }
        })
    });    
});