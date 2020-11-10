<x-app-layout>
    <x-slot name="header">
    	<div class="row">
    		<div class="col-md-8 col-12">
    			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		            {{ __('Dashboard') }}
		        </h2>
    			
    		</div>
    	
	    	<div class="col-md-4 col-12">
	    		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCategoryModal">
	    			Add Category
	    		</button>
	    	</div>

    	</div>
    </x-slot>


	<!-- TABLA -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Description</th>
				      <th scope="col">Category</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@if (isset($books) && count($books)>0)
				  	@foreach ($books as $book)
				  	
				    <tr>
				      <th scope="row">
				      	{{ $book->id }}
				      </th>
				      <td>
				      	{{ $book->title }}
				      </td>
				      <td>
				      	{{ $book->description }}
				      </td>
				      <td>
				      	{{ $book->category_id }}
				      </td>
				    </tr>

				    @endforeach
				    @endif
				  </tbody>
				</table>

            </div>
        </div>
    </div>


    <!-- MODAL -->

	<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form method="POST" action="{{ url('categories') }}">
					@csrf

					<div class="modal-body">
						
						<div class="form-group">
						    <label for="exampleInputEmail1">
						    	Name
						    </label>

						    <div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1">@</span>
							  </div>
							  <input type="text" class="form-control" placeholder="Category name" aria-label="category" aria-describedby="basic-addon1" name="name" id="input_name">
							</div>
						</div>

						<div class="form-group">
						    <label for="exampleInputEmail1">
						    	Description
						    </label>

						    <div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="basic-addon1">@</span>
							  </div>
							  <textarea class="form-control" rows="5" placeholder="Description of category" name="description" id="input_description">
							  </textarea>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Cancel
						</button>
						<button type="submit" class="btn btn-primary">
							Save category
						</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>

</x-app-layout>
