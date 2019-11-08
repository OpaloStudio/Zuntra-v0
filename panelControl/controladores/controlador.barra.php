<script>
  $(document).ready(function(){
    $.ajax({
      type: "post",
      url: "modelos/modelo.barra.php",
      data: {
        "opcion": "1"
      },
      success: function(response) {
        var r = parseInt(response);
        if(r == 0)
          $("#barra").attr("hidden", true);
      }
    });
  });
</script>