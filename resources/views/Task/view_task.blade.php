<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task Table</title>
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="assets/fonts/all.css">
    <link rel="stylesheet" type="text/css" href="assets/table.css">
</head>
<body>

    <div class="table">
    	<div class="table-header">
    		<p>Task Details</p>
    		<div>
    			<input placeholder="Search...">
    			<button class="add_new"><i class="fa fa-search"></i></button>
    		</div>
    	</div>
        <div class="table_section">
        	<table>
        		<thead>
                <tr>
        			<th>S/No.</th>
        			<th>Title</th>
        			<th>Description</th>
        			<th>Status</th>
        			<th>Action</th>
                </tr>       		
                </thead>

        		<tbody>
                    
        			<tr>
        				<td>{{$task['id']}}</td>
        				<td>{{$task['title']}}</td>
        				<td>{{$task['description']}}</td>
                        <td>{{$task['status']}}</td>
                                   
        				<td><button><a href="{{Route('view',$task->id)}}">View</a></button>
                            <button><a href="{{Route('delete',$task->id)}}">Delete</a></button>
                            <button><a href="{{Route('edit',$task->id)}}">Update</a></button>
                        </td>
        			</tr>
                  
        		</tbody>
        	</table>
        </div>
       
    </div>

</body>
</html>