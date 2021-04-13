<?php 
include './src/api.php';
?>

<?php 
	$data = new Api();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Books Inventory App</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<style>
		.vertical-center {
			height:100%;
			width:100%;

			text-align: center;  /* align the inline(-block) elements horizontally */
			font: 0/0 a;         /* remove the gap between inline(-block) elements */
		}

		.content-margin{
			margin-top: 100px;
			margin-left: 100px;
			margin-right: 100px;
			margin-bottom: 100px;
			width: 100%;
		}
	</style>
	<body>
		<div class="container content-margin">
				<div class="row">
					<div class="col-md-3">
						<button id="add-book" class="form-control btn btn-success pull-right"> &plus; Add a new book</button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-8">
						<table class="table table-bordered" id="data-table">
						<thead>
								<th>Action</th>
								<th>Title</th>
								<th>ISBN</th>
								<th>Author</th>
								<th>Publisher</th>
								<th>Year Published</th>
								<th>Category</th>
								<th>Archived</th>
						</thead>
						<tbody>

						</tbody>
						</table>
					</div>	
				</div>
		</div>
	</body>
	
	<?php 
		require_once('./src/modal.php');
	?>
	<!-- javascript library for bootstrap design  -->
	
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			var id = 0;
			async function refreshTable()
			{
				var tbody = '';
				let records = await fetch("/crud_app/src/select_books.php");
				let records_result = await records.json();
				$("#data-table>tbody").empty();
				records_result.forEach((element) => {
					tbody = tbody + `<tr>
							<td><button class='btn btn-success edit' data-id='${element.id}'>Edit</button><br><button class='btn btn-danger delete' data-id='${element.id}'>Del</button></td>
							<td>${element.title}</td>
							<td>${element.isbn}</td>
							<td>${element.author}</td>
							<td>${element.publisher}</td>
							<td>${element.year_published}</td>
							<td>${element.category}</td>
							<td>${element.archived == "0" ? "No" : "Yes"}</td>
							</tr>`;
				});
				
				$("#data-table>tbody").append(tbody);
			}

			refreshTable();

			$("#add-book").on('click', function(){
				id = 0;
				$("#book-form").trigger("reset");
				$("#form-modal").modal('show');
			});

			$(document).on('click', '.edit', function(){
				$("#book-title").val($(this).closest("tr").find("td").eq(1).text());
				$("#book-isbn").val($(this).closest("tr").find("td").eq(2).text());
				$("#book-author").val($(this).closest("tr").find("td").eq(3).text());
				$("#book-publisher").val($(this).closest("tr").find("td").eq(4).text());
				$("#book-year").val($(this).closest("tr").find("td").eq(5).text());
				$("#book-category").val($(this).closest("tr").find("td").eq(6).text());
				$("#archived").prop("checked", $(this).closest("tr").find("td").eq(7).text() == "Yes" ? true : false);
				id = $(this).data("id");
				$("#form-modal").modal('show');
			})

			$(document).on('click', '.delete', async function(){
				if(confirm("You sure you want to delete this?"))
				{
					id = $(this).data("id");

					let response = await fetch("/crud_app/src/delete.php", { 
    					method: "POST",
  						headers: {"Content-type": "application/json; charset=UTF-8"},
						body: JSON.stringify({id : id}) 
					});
					let result = await response.json();
					refreshTable();
				}
			})

			$("#book-form").on("submit", async function(e) {
				e.preventDefault();
				console.log(id);
				var url = "";
				var formData = [];
				formData.push({value : id, name : 'id'});
				formData.push($("#book-form").serializeArray());
				if(id == 0)
				{
					url = "/crud_app/src/create.php";
				}
				else
				{
					url = "/crud_app/src/update.php";
				}
				let response = await fetch(url, { 
    					method: "POST",
  						headers: {"Content-type": "application/json; charset=UTF-8"},
						body: JSON.stringify(formData) 
				});

				let result = await response.json();
				$(".modal-close").trigger("click");

				refreshTable();

				
			})
		})
	</script>
</html>

