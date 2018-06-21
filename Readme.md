## Default output

```
truncate --size 0 var/log/dev.log && tail -f var/log/dev.log 

[2018-06-21 19:23:07] request.INFO: Matched route "some_payload". {"route":"some_payload","route_parameters":{"_route":"some_payload","placeholder":"default","_controller":"App\\Controller\\SomePayloadController::index"},"request_uri":"http://127.0.0.1:8000/log-tester","method":"GET"} []
[2018-06-21 19:23:07] app.INFO: The placeholder was default [] []
[2018-06-21 19:23:07] app.DEBUG: onSomeEvent {"payload":"default"} []
[2018-06-21 19:23:07] app.EMERGENCY: PRE SAVE {"whatever":["default"]} []
[2018-06-21 19:23:08] app.CRITICAL: POST SAVE {"whatever":["default"],"result":false} []
```


## Custom Placeholder output

```
truncate --size 0 var/log/dev.log && tail -f var/log/dev.log

[2018-06-21 19:23:39] request.INFO: Matched route "some_payload". {"route":"some_payload","route_parameters":{"_route":"some_payload","placeholder":"custom","_controller":"App\\Controller\\SomePayloadController::index"},"request_uri":"http://127.0.0.1:8000/log-tester/custom","method":"GET"} []
[2018-06-21 19:23:39] app.NOTICE: The placeholder was NOT default {"placeholder":"custom"} []
[2018-06-21 19:23:39] app.DEBUG: onSomeEvent {"payload":"custom"} []
[2018-06-21 19:23:39] app.EMERGENCY: PRE SAVE {"whatever":["custom"]} []
[2018-06-21 19:23:40] app.CRITICAL: POST SAVE {"whatever":["custom"],"result":true} []
```
