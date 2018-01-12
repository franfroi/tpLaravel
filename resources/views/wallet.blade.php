

  
       <div class="panel-body">

                <table style="width:100%">
                    <tr>
                        <th>Wallet</th>
                        <th>Type</th> 
                        <th>Amount</th>
                    </tr>
                    
                    @foreach($wallet as $element)  
                    <tr>
                        <td> {{$element->key}}</td>
                        <td> {{$element->description}}</td> 
                        <td> {{$element->amount}}</td>
                    </tr>
                    
                    @endforeach  

                </table>


        </div> 


