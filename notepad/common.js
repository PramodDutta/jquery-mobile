
//shared js functions for all pages

var $key = "notepad";

function save($note)
{
	var $data = localStorage.getItem($key);
	
	var $id;
    if ($data && $data.length > 0)
    {
		$data = JSON.parse($data);
		
		$id = $data.id + 1;
		$data.id = $id;
		$data.data[$id] = [0, $note];
    }
    else
    {
    	$data = {
    		id: 1,
    		data: {
    			1: [0, $note]
    		}
    	};
    }
    $data = JSON.stringify($data);
    localStorage.setItem($key, $data);
    
    return true;
}

function getAll()
{
	var $data = localStorage.getItem($key);
    if ($data && $data.length > 0)
    {
		$data = JSON.parse($data);
    }
    else
    {
    	$data = null;
    }
    
    return $data;
}

function moveToTrash($id) 
{
	var $data = localStorage.getItem($key);
    if ($data && $data.length > 0)
    {
		$data = JSON.parse($data);
		$data.data[$id][0] = 1;
    }
    $data = JSON.stringify($data);
    localStorage.setItem($key, $data);
    
    return true;
}

function retoreFromTrash($id) 
{
	var $data = localStorage.getItem($key);
    if ($data && $data.length > 0)
    {
		$data = JSON.parse($data);
		$data.data[$id][0] = 0;
    }
    $data = JSON.stringify($data);
    localStorage.setItem($key, $data);
    
    return true;
}

function deleteForever($id) 
{
	var $data = localStorage.getItem($key);
    if ($data && $data.length > 0)
    {
		$data = JSON.parse($data);
		delete $data.data[$id];
    }
    $data = JSON.stringify($data);
    localStorage.setItem($key, $data);
    
    return true;
}

