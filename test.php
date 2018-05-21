<?





public function store(StoreRestaurant $request)
	{
		if (isset($request->validator) && $request->validator->fails()){
          return response()->json($request->validator->getMessageBag(), 400);
        }
		else{
				$restaurants = restaurants::create($request->all());
				return response()->json($restaurants, 201);
		}
	}

	public function destroy(Request $request)
	{
		$id = $request->input('id');
		$restaurants = restaurants::find($request['id']);
		if (!isset($restaurants))
            {
                return response()->json(['message'=>'Cannot find Restaurant ID '.$id.' .Please enter Restaurant ID again.'], 400);
            }
		else{
					$restaurants->delete();
					return response()->json(null, 204);
		}
	}



	public function createpost(StorePost $request)
	{
		if (isset($request->validator) && $request->validator->fails()){
          return response()->json($request->validator->getMessageBag(), 400);
        }
		else{
		$restaurants = restaurants::find($request['restaurant_id']);
		$posts = $restaurants->post()->create($request->all());
		return response()->json($posts, 201);
}
}

	public function updatepost(StorePost $request)
	{
		if (isset($request->validator) && $request->validator->fails()){
          return response()->json($request->validator->getMessageBag(), 400);
        }
		else{
		$restaurants = restaurants::find($request['restaurant_id']);
		$restaurants->post->find($request['postid'])->update($request->all());
		return response()->json($restaurants->post->find($request['postid']), 201);
	}
	}

	public function deletepost(StoreRestaurant $request)
	{
		$id = $request->input('id');
		$post = posts::find($request['postid']);
		$id2 = $request->input('postid');
		$restaurants = restaurants::find($request['id']);
		if (!isset($restaurants))
            {
                return response()->json(['message'=>'Cannot find Restaurant ID '.$id.' .Please enter Restaurant ID again.'], 400);
            }
		else{
			if (!isset($post))
	            {
	                return response()->json(['message'=>'Cannot find Post ID'.$id2.' .Please enter Post ID again.'], 400);
	            }
			else{
		$restaurants->post->find($request['postid'])->delete();
		return response()->json(null, 204);
	}
	}
	}
