<!-- icon feather -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
    integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
	feather.replace()
    $('#myTable').DataTable();
	$('.up').hide()
    $(".down").on('click', function() {
        $(this).hide();
        $(this).next(".up").show();
    });
    $(".up").on('click', function() {
        $(this).hide();
        $(this).prev(".down").show();
    });
	
	setTimeout(() => {
		$('.alert').fadeOut()
	}, 2000);
});
</script>
</body>

</html>
