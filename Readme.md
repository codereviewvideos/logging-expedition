## Default output

```
truncate --size 0 var/log/dev.log && tail -f var/log/dev.log 

[2018-06-21 20:21:47] request.INFO: Matched route "some_payload". {"route":"some_payload","route_parameters":{"_route":"some_payload","placeholder":"default","_controller":"App\\Controller\\SomePayloadController::index"},"request_uri":"http://127.0.0.1:8000/log-tester","method":"GET"} []
[2018-06-21 20:21:47] app.INFO: The placeholder was default [] []
[2018-06-21 20:21:47] app.DEBUG: onSomeEvent {"payload":"default"} []
[2018-06-21 20:21:47] app.EMERGENCY: PRE SAVE {"whatever":["default"]} []
[2018-06-21 20:21:48] app.CRITICAL: POST SAVE {"whatever":["default"],"result":false} []
[2018-06-21 20:21:48] app.DEBUG: This is logged after SomeEvent has been dispatched in the controller. [] []
```


## Custom Placeholder output

```
truncate --size 0 var/log/dev.log && tail -f var/log/dev.log

[2018-06-21 20:21:12] request.INFO: Matched route "some_payload". {"route":"some_payload","route_parameters":{"_route":"some_payload","placeholder":"custom","_controller":"App\\Controller\\SomePayloadController::index"},"request_uri":"http://127.0.0.1:8000/log-tester/custom","method":"GET"} []
[2018-06-21 20:21:12] app.NOTICE: The placeholder was NOT default {"placeholder":"custom"} []
[2018-06-21 20:21:12] app.DEBUG: onSomeEvent {"payload":"custom"} []
[2018-06-21 20:21:12] app.EMERGENCY: PRE SAVE {"whatever":["custom"]} []
[2018-06-21 20:21:13] app.CRITICAL: POST SAVE {"whatever":["custom"],"result":true} []
[2018-06-21 20:21:13] app.DEBUG: This is logged after SomeEvent has been dispatched in the controller. [] []
```
