<?php
// This file was auto-generated from sdk-root/src/data/controltower/2018-05-10/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-05-10', 'endpointPrefix' => 'controltower', 'jsonVersion' => '1.1', 'protocol' => 'rest-json', 'serviceFullName' => 'AWS Control Tower', 'serviceId' => 'ControlTower', 'signatureVersion' => 'v4', 'signingName' => 'controltower', 'uid' => 'controltower-2018-05-10', ], 'operations' => [ 'CreateLandingZone' => [ 'name' => 'CreateLandingZone', 'http' => [ 'method' => 'POST', 'requestUri' => '/create-landingzone', 'responseCode' => 200, ], 'input' => [ 'shape' => 'CreateLandingZoneInput', ], 'output' => [ 'shape' => 'CreateLandingZoneOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'DeleteLandingZone' => [ 'name' => 'DeleteLandingZone', 'http' => [ 'method' => 'POST', 'requestUri' => '/delete-landingzone', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DeleteLandingZoneInput', ], 'output' => [ 'shape' => 'DeleteLandingZoneOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'DisableBaseline' => [ 'name' => 'DisableBaseline', 'http' => [ 'method' => 'POST', 'requestUri' => '/disable-baseline', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DisableBaselineInput', ], 'output' => [ 'shape' => 'DisableBaselineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], 'idempotent' => true, ], 'DisableControl' => [ 'name' => 'DisableControl', 'http' => [ 'method' => 'POST', 'requestUri' => '/disable-control', 'responseCode' => 200, ], 'input' => [ 'shape' => 'DisableControlInput', ], 'output' => [ 'shape' => 'DisableControlOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'EnableBaseline' => [ 'name' => 'EnableBaseline', 'http' => [ 'method' => 'POST', 'requestUri' => '/enable-baseline', 'responseCode' => 200, ], 'input' => [ 'shape' => 'EnableBaselineInput', ], 'output' => [ 'shape' => 'EnableBaselineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'EnableControl' => [ 'name' => 'EnableControl', 'http' => [ 'method' => 'POST', 'requestUri' => '/enable-control', 'responseCode' => 200, ], 'input' => [ 'shape' => 'EnableControlInput', ], 'output' => [ 'shape' => 'EnableControlOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetBaseline' => [ 'name' => 'GetBaseline', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-baseline', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetBaselineInput', ], 'output' => [ 'shape' => 'GetBaselineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetBaselineOperation' => [ 'name' => 'GetBaselineOperation', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-baseline-operation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetBaselineOperationInput', ], 'output' => [ 'shape' => 'GetBaselineOperationOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetControlOperation' => [ 'name' => 'GetControlOperation', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-control-operation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetControlOperationInput', ], 'output' => [ 'shape' => 'GetControlOperationOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetEnabledBaseline' => [ 'name' => 'GetEnabledBaseline', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-enabled-baseline', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetEnabledBaselineInput', ], 'output' => [ 'shape' => 'GetEnabledBaselineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetEnabledControl' => [ 'name' => 'GetEnabledControl', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-enabled-control', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetEnabledControlInput', ], 'output' => [ 'shape' => 'GetEnabledControlOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetLandingZone' => [ 'name' => 'GetLandingZone', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-landingzone', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetLandingZoneInput', ], 'output' => [ 'shape' => 'GetLandingZoneOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'GetLandingZoneOperation' => [ 'name' => 'GetLandingZoneOperation', 'http' => [ 'method' => 'POST', 'requestUri' => '/get-landingzone-operation', 'responseCode' => 200, ], 'input' => [ 'shape' => 'GetLandingZoneOperationInput', ], 'output' => [ 'shape' => 'GetLandingZoneOperationOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListBaselines' => [ 'name' => 'ListBaselines', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-baselines', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListBaselinesInput', ], 'output' => [ 'shape' => 'ListBaselinesOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListEnabledBaselines' => [ 'name' => 'ListEnabledBaselines', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-enabled-baselines', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListEnabledBaselinesInput', ], 'output' => [ 'shape' => 'ListEnabledBaselinesOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListEnabledControls' => [ 'name' => 'ListEnabledControls', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-enabled-controls', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListEnabledControlsInput', ], 'output' => [ 'shape' => 'ListEnabledControlsOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ListLandingZones' => [ 'name' => 'ListLandingZones', 'http' => [ 'method' => 'POST', 'requestUri' => '/list-landingzones', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListLandingZonesInput', ], 'output' => [ 'shape' => 'ListLandingZonesOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], ], ], 'ListTagsForResource' => [ 'name' => 'ListTagsForResource', 'http' => [ 'method' => 'GET', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ListTagsForResourceInput', ], 'output' => [ 'shape' => 'ListTagsForResourceOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ResetEnabledBaseline' => [ 'name' => 'ResetEnabledBaseline', 'http' => [ 'method' => 'POST', 'requestUri' => '/reset-enabled-baseline', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ResetEnabledBaselineInput', ], 'output' => [ 'shape' => 'ResetEnabledBaselineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'ResetLandingZone' => [ 'name' => 'ResetLandingZone', 'http' => [ 'method' => 'POST', 'requestUri' => '/reset-landingzone', 'responseCode' => 200, ], 'input' => [ 'shape' => 'ResetLandingZoneInput', ], 'output' => [ 'shape' => 'ResetLandingZoneOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'TagResource' => [ 'name' => 'TagResource', 'http' => [ 'method' => 'POST', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'TagResourceInput', ], 'output' => [ 'shape' => 'TagResourceOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UntagResource' => [ 'name' => 'UntagResource', 'http' => [ 'method' => 'DELETE', 'requestUri' => '/tags/{resourceArn}', 'responseCode' => 204, ], 'input' => [ 'shape' => 'UntagResourceInput', ], 'output' => [ 'shape' => 'UntagResourceOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateEnabledBaseline' => [ 'name' => 'UpdateEnabledBaseline', 'http' => [ 'method' => 'POST', 'requestUri' => '/update-enabled-baseline', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateEnabledBaselineInput', ], 'output' => [ 'shape' => 'UpdateEnabledBaselineOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateEnabledControl' => [ 'name' => 'UpdateEnabledControl', 'http' => [ 'method' => 'POST', 'requestUri' => '/update-enabled-control', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateEnabledControlInput', ], 'output' => [ 'shape' => 'UpdateEnabledControlOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'ServiceQuotaExceededException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], 'UpdateLandingZone' => [ 'name' => 'UpdateLandingZone', 'http' => [ 'method' => 'POST', 'requestUri' => '/update-landingzone', 'responseCode' => 200, ], 'input' => [ 'shape' => 'UpdateLandingZoneInput', ], 'output' => [ 'shape' => 'UpdateLandingZoneOutput', ], 'errors' => [ [ 'shape' => 'ValidationException', ], [ 'shape' => 'ConflictException', ], [ 'shape' => 'InternalServerException', ], [ 'shape' => 'AccessDeniedException', ], [ 'shape' => 'ThrottlingException', ], [ 'shape' => 'ResourceNotFoundException', ], ], ], ], 'shapes' => [ 'AccessDeniedException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 403, 'senderFault' => true, ], 'exception' => true, ], 'Arn' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => '^arn:aws[0-9a-zA-Z_\\-:\\/]+$', ], 'BaselineArn' => [ 'type' => 'string', 'pattern' => '^arn:[a-z-]+:controltower:[a-z0-9-]*:[0-9]{0,12}:baseline/[A-Z0-9]{16}$', ], 'BaselineOperation' => [ 'type' => 'structure', 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', ], 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], 'operationType' => [ 'shape' => 'BaselineOperationType', ], 'startTime' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'BaselineOperationStatus', ], 'statusMessage' => [ 'shape' => 'String', ], ], ], 'BaselineOperationStatus' => [ 'type' => 'string', 'enum' => [ 'SUCCEEDED', 'FAILED', 'IN_PROGRESS', ], ], 'BaselineOperationType' => [ 'type' => 'string', 'enum' => [ 'ENABLE_BASELINE', 'DISABLE_BASELINE', 'UPDATE_ENABLED_BASELINE', 'RESET_ENABLED_BASELINE', ], ], 'BaselineSummary' => [ 'type' => 'structure', 'required' => [ 'arn', 'name', ], 'members' => [ 'arn' => [ 'shape' => 'String', ], 'description' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], ], ], 'BaselineVersion' => [ 'type' => 'string', 'max' => 10, 'min' => 1, 'pattern' => '^\\d+(?:\\.\\d+){0,2}$', ], 'Baselines' => [ 'type' => 'list', 'member' => [ 'shape' => 'BaselineSummary', ], ], 'ConflictException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 409, 'senderFault' => true, ], 'exception' => true, ], 'ControlIdentifier' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => '^arn:aws[0-9a-zA-Z_\\-:\\/]+$', ], 'ControlOperation' => [ 'type' => 'structure', 'members' => [ 'endTime' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'operationType' => [ 'shape' => 'ControlOperationType', ], 'startTime' => [ 'shape' => 'SyntheticTimestamp_date_time', ], 'status' => [ 'shape' => 'ControlOperationStatus', ], 'statusMessage' => [ 'shape' => 'String', ], ], ], 'ControlOperationStatus' => [ 'type' => 'string', 'enum' => [ 'SUCCEEDED', 'FAILED', 'IN_PROGRESS', ], ], 'ControlOperationType' => [ 'type' => 'string', 'enum' => [ 'ENABLE_CONTROL', 'DISABLE_CONTROL', 'UPDATE_ENABLED_CONTROL', ], ], 'CreateLandingZoneInput' => [ 'type' => 'structure', 'required' => [ 'manifest', 'version', ], 'members' => [ 'manifest' => [ 'shape' => 'Manifest', ], 'tags' => [ 'shape' => 'TagMap', ], 'version' => [ 'shape' => 'LandingZoneVersion', ], ], ], 'CreateLandingZoneOutput' => [ 'type' => 'structure', 'required' => [ 'arn', 'operationIdentifier', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'DeleteLandingZoneInput' => [ 'type' => 'structure', 'required' => [ 'landingZoneIdentifier', ], 'members' => [ 'landingZoneIdentifier' => [ 'shape' => 'String', ], ], ], 'DeleteLandingZoneOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'DisableBaselineInput' => [ 'type' => 'structure', 'required' => [ 'enabledBaselineIdentifier', ], 'members' => [ 'enabledBaselineIdentifier' => [ 'shape' => 'Arn', ], ], ], 'DisableBaselineOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'DisableControlInput' => [ 'type' => 'structure', 'required' => [ 'controlIdentifier', 'targetIdentifier', ], 'members' => [ 'controlIdentifier' => [ 'shape' => 'ControlIdentifier', ], 'targetIdentifier' => [ 'shape' => 'TargetIdentifier', ], ], ], 'DisableControlOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'Document' => [ 'type' => 'structure', 'members' => [], 'document' => true, ], 'DriftStatus' => [ 'type' => 'string', 'enum' => [ 'DRIFTED', 'IN_SYNC', 'NOT_CHECKING', 'UNKNOWN', ], ], 'DriftStatusSummary' => [ 'type' => 'structure', 'members' => [ 'driftStatus' => [ 'shape' => 'DriftStatus', ], ], ], 'EnableBaselineInput' => [ 'type' => 'structure', 'required' => [ 'baselineIdentifier', 'baselineVersion', 'targetIdentifier', ], 'members' => [ 'baselineIdentifier' => [ 'shape' => 'Arn', ], 'baselineVersion' => [ 'shape' => 'BaselineVersion', ], 'parameters' => [ 'shape' => 'EnabledBaselineParameters', ], 'tags' => [ 'shape' => 'TagMap', ], 'targetIdentifier' => [ 'shape' => 'Arn', ], ], ], 'EnableBaselineOutput' => [ 'type' => 'structure', 'required' => [ 'arn', 'operationIdentifier', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'EnableControlInput' => [ 'type' => 'structure', 'required' => [ 'controlIdentifier', 'targetIdentifier', ], 'members' => [ 'controlIdentifier' => [ 'shape' => 'ControlIdentifier', ], 'parameters' => [ 'shape' => 'EnabledControlParameters', ], 'tags' => [ 'shape' => 'TagMap', ], 'targetIdentifier' => [ 'shape' => 'TargetIdentifier', ], ], ], 'EnableControlOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'EnabledBaselineBaselineIdentifiers' => [ 'type' => 'list', 'member' => [ 'shape' => 'Arn', ], 'max' => 5, 'min' => 1, ], 'EnabledBaselineDetails' => [ 'type' => 'structure', 'required' => [ 'arn', 'baselineIdentifier', 'statusSummary', 'targetIdentifier', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'baselineIdentifier' => [ 'shape' => 'String', ], 'baselineVersion' => [ 'shape' => 'String', ], 'parameters' => [ 'shape' => 'EnabledBaselineParameterSummaries', ], 'statusSummary' => [ 'shape' => 'EnablementStatusSummary', ], 'targetIdentifier' => [ 'shape' => 'String', ], ], ], 'EnabledBaselineFilter' => [ 'type' => 'structure', 'members' => [ 'baselineIdentifiers' => [ 'shape' => 'EnabledBaselineBaselineIdentifiers', ], 'targetIdentifiers' => [ 'shape' => 'EnabledBaselineTargetIdentifiers', ], ], ], 'EnabledBaselineParameter' => [ 'type' => 'structure', 'required' => [ 'key', 'value', ], 'members' => [ 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'EnabledBaselineParameterDocument', ], ], ], 'EnabledBaselineParameterDocument' => [ 'type' => 'structure', 'members' => [], 'document' => true, ], 'EnabledBaselineParameterSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnabledBaselineParameterSummary', ], ], 'EnabledBaselineParameterSummary' => [ 'type' => 'structure', 'required' => [ 'key', 'value', ], 'members' => [ 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'EnabledBaselineParameterDocument', ], ], ], 'EnabledBaselineParameters' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnabledBaselineParameter', ], ], 'EnabledBaselineSummary' => [ 'type' => 'structure', 'required' => [ 'arn', 'baselineIdentifier', 'statusSummary', 'targetIdentifier', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'baselineIdentifier' => [ 'shape' => 'String', ], 'baselineVersion' => [ 'shape' => 'String', ], 'statusSummary' => [ 'shape' => 'EnablementStatusSummary', ], 'targetIdentifier' => [ 'shape' => 'String', ], ], ], 'EnabledBaselineTargetIdentifiers' => [ 'type' => 'list', 'member' => [ 'shape' => 'Arn', ], 'max' => 5, 'min' => 1, ], 'EnabledBaselines' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnabledBaselineSummary', ], ], 'EnabledControlDetails' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'controlIdentifier' => [ 'shape' => 'ControlIdentifier', ], 'driftStatusSummary' => [ 'shape' => 'DriftStatusSummary', ], 'parameters' => [ 'shape' => 'EnabledControlParameterSummaries', ], 'statusSummary' => [ 'shape' => 'EnablementStatusSummary', ], 'targetIdentifier' => [ 'shape' => 'TargetIdentifier', ], 'targetRegions' => [ 'shape' => 'TargetRegions', ], ], ], 'EnabledControlParameter' => [ 'type' => 'structure', 'required' => [ 'key', 'value', ], 'members' => [ 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'Document', ], ], ], 'EnabledControlParameterSummaries' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnabledControlParameterSummary', ], ], 'EnabledControlParameterSummary' => [ 'type' => 'structure', 'required' => [ 'key', 'value', ], 'members' => [ 'key' => [ 'shape' => 'String', ], 'value' => [ 'shape' => 'Document', ], ], ], 'EnabledControlParameters' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnabledControlParameter', ], ], 'EnabledControlSummary' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'controlIdentifier' => [ 'shape' => 'ControlIdentifier', ], 'driftStatusSummary' => [ 'shape' => 'DriftStatusSummary', ], 'statusSummary' => [ 'shape' => 'EnablementStatusSummary', ], 'targetIdentifier' => [ 'shape' => 'TargetIdentifier', ], ], ], 'EnabledControls' => [ 'type' => 'list', 'member' => [ 'shape' => 'EnabledControlSummary', ], ], 'EnablementStatus' => [ 'type' => 'string', 'enum' => [ 'SUCCEEDED', 'FAILED', 'UNDER_CHANGE', ], ], 'EnablementStatusSummary' => [ 'type' => 'structure', 'members' => [ 'lastOperationIdentifier' => [ 'shape' => 'OperationIdentifier', ], 'status' => [ 'shape' => 'EnablementStatus', ], ], ], 'GetBaselineInput' => [ 'type' => 'structure', 'required' => [ 'baselineIdentifier', ], 'members' => [ 'baselineIdentifier' => [ 'shape' => 'BaselineArn', ], ], ], 'GetBaselineOperationInput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'GetBaselineOperationOutput' => [ 'type' => 'structure', 'required' => [ 'baselineOperation', ], 'members' => [ 'baselineOperation' => [ 'shape' => 'BaselineOperation', ], ], ], 'GetBaselineOutput' => [ 'type' => 'structure', 'required' => [ 'arn', 'name', ], 'members' => [ 'arn' => [ 'shape' => 'BaselineArn', ], 'description' => [ 'shape' => 'String', ], 'name' => [ 'shape' => 'String', ], ], ], 'GetControlOperationInput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'GetControlOperationOutput' => [ 'type' => 'structure', 'required' => [ 'controlOperation', ], 'members' => [ 'controlOperation' => [ 'shape' => 'ControlOperation', ], ], ], 'GetEnabledBaselineInput' => [ 'type' => 'structure', 'required' => [ 'enabledBaselineIdentifier', ], 'members' => [ 'enabledBaselineIdentifier' => [ 'shape' => 'Arn', ], ], ], 'GetEnabledBaselineOutput' => [ 'type' => 'structure', 'members' => [ 'enabledBaselineDetails' => [ 'shape' => 'EnabledBaselineDetails', ], ], ], 'GetEnabledControlInput' => [ 'type' => 'structure', 'required' => [ 'enabledControlIdentifier', ], 'members' => [ 'enabledControlIdentifier' => [ 'shape' => 'Arn', ], ], ], 'GetEnabledControlOutput' => [ 'type' => 'structure', 'required' => [ 'enabledControlDetails', ], 'members' => [ 'enabledControlDetails' => [ 'shape' => 'EnabledControlDetails', ], ], ], 'GetLandingZoneInput' => [ 'type' => 'structure', 'required' => [ 'landingZoneIdentifier', ], 'members' => [ 'landingZoneIdentifier' => [ 'shape' => 'String', ], ], ], 'GetLandingZoneOperationInput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'GetLandingZoneOperationOutput' => [ 'type' => 'structure', 'required' => [ 'operationDetails', ], 'members' => [ 'operationDetails' => [ 'shape' => 'LandingZoneOperationDetail', ], ], ], 'GetLandingZoneOutput' => [ 'type' => 'structure', 'required' => [ 'landingZone', ], 'members' => [ 'landingZone' => [ 'shape' => 'LandingZoneDetail', ], ], ], 'Integer' => [ 'type' => 'integer', 'box' => true, ], 'InternalServerException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 500, ], 'exception' => true, 'fault' => true, 'retryable' => [ 'throttling' => false, ], ], 'LandingZoneDetail' => [ 'type' => 'structure', 'required' => [ 'manifest', 'version', ], 'members' => [ 'arn' => [ 'shape' => 'Arn', ], 'driftStatus' => [ 'shape' => 'LandingZoneDriftStatusSummary', ], 'latestAvailableVersion' => [ 'shape' => 'LandingZoneVersion', ], 'manifest' => [ 'shape' => 'Manifest', ], 'status' => [ 'shape' => 'LandingZoneStatus', ], 'version' => [ 'shape' => 'LandingZoneVersion', ], ], ], 'LandingZoneDriftStatus' => [ 'type' => 'string', 'enum' => [ 'DRIFTED', 'IN_SYNC', ], ], 'LandingZoneDriftStatusSummary' => [ 'type' => 'structure', 'members' => [ 'status' => [ 'shape' => 'LandingZoneDriftStatus', ], ], ], 'LandingZoneOperationDetail' => [ 'type' => 'structure', 'members' => [ 'endTime' => [ 'shape' => 'Timestamp', ], 'operationType' => [ 'shape' => 'LandingZoneOperationType', ], 'startTime' => [ 'shape' => 'Timestamp', ], 'status' => [ 'shape' => 'LandingZoneOperationStatus', ], 'statusMessage' => [ 'shape' => 'String', ], ], ], 'LandingZoneOperationStatus' => [ 'type' => 'string', 'enum' => [ 'SUCCEEDED', 'FAILED', 'IN_PROGRESS', ], ], 'LandingZoneOperationType' => [ 'type' => 'string', 'enum' => [ 'DELETE', 'CREATE', 'UPDATE', 'RESET', ], ], 'LandingZoneStatus' => [ 'type' => 'string', 'enum' => [ 'ACTIVE', 'PROCESSING', 'FAILED', ], ], 'LandingZoneSummary' => [ 'type' => 'structure', 'members' => [ 'arn' => [ 'shape' => 'Arn', ], ], ], 'LandingZoneVersion' => [ 'type' => 'string', 'max' => 10, 'min' => 3, 'pattern' => '^\\d+.\\d+$', ], 'ListBaselinesInput' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'ListBaselinesMaxResults', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListBaselinesMaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 4, ], 'ListBaselinesOutput' => [ 'type' => 'structure', 'required' => [ 'baselines', ], 'members' => [ 'baselines' => [ 'shape' => 'Baselines', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListEnabledBaselinesInput' => [ 'type' => 'structure', 'members' => [ 'filter' => [ 'shape' => 'EnabledBaselineFilter', ], 'maxResults' => [ 'shape' => 'ListEnabledBaselinesMaxResults', ], 'nextToken' => [ 'shape' => 'ListEnabledBaselinesNextToken', ], ], ], 'ListEnabledBaselinesMaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 100, 'min' => 5, ], 'ListEnabledBaselinesNextToken' => [ 'type' => 'string', 'pattern' => '\\S+', ], 'ListEnabledBaselinesOutput' => [ 'type' => 'structure', 'required' => [ 'enabledBaselines', ], 'members' => [ 'enabledBaselines' => [ 'shape' => 'EnabledBaselines', ], 'nextToken' => [ 'shape' => 'ListEnabledBaselinesNextToken', ], ], ], 'ListEnabledControlsInput' => [ 'type' => 'structure', 'required' => [ 'targetIdentifier', ], 'members' => [ 'maxResults' => [ 'shape' => 'MaxResults', ], 'nextToken' => [ 'shape' => 'String', ], 'targetIdentifier' => [ 'shape' => 'TargetIdentifier', ], ], ], 'ListEnabledControlsOutput' => [ 'type' => 'structure', 'required' => [ 'enabledControls', ], 'members' => [ 'enabledControls' => [ 'shape' => 'EnabledControls', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListLandingZonesInput' => [ 'type' => 'structure', 'members' => [ 'maxResults' => [ 'shape' => 'ListLandingZonesMaxResults', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListLandingZonesMaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 1, 'min' => 1, ], 'ListLandingZonesOutput' => [ 'type' => 'structure', 'required' => [ 'landingZones', ], 'members' => [ 'landingZones' => [ 'shape' => 'ListLandingZonesOutputLandingZonesList', ], 'nextToken' => [ 'shape' => 'String', ], ], ], 'ListLandingZonesOutputLandingZonesList' => [ 'type' => 'list', 'member' => [ 'shape' => 'LandingZoneSummary', ], 'max' => 1, 'min' => 0, ], 'ListTagsForResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], ], ], 'ListTagsForResourceOutput' => [ 'type' => 'structure', 'required' => [ 'tags', ], 'members' => [ 'tags' => [ 'shape' => 'TagMap', ], ], ], 'Manifest' => [ 'type' => 'structure', 'members' => [], 'document' => true, ], 'MaxResults' => [ 'type' => 'integer', 'box' => true, 'max' => 200, 'min' => 1, ], 'OperationIdentifier' => [ 'type' => 'string', 'max' => 36, 'min' => 36, 'pattern' => '^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$', ], 'Region' => [ 'type' => 'structure', 'members' => [ 'name' => [ 'shape' => 'RegionName', ], ], ], 'RegionName' => [ 'type' => 'string', 'max' => 50, 'min' => 1, ], 'ResetEnabledBaselineInput' => [ 'type' => 'structure', 'required' => [ 'enabledBaselineIdentifier', ], 'members' => [ 'enabledBaselineIdentifier' => [ 'shape' => 'Arn', ], ], ], 'ResetEnabledBaselineOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'ResetLandingZoneInput' => [ 'type' => 'structure', 'required' => [ 'landingZoneIdentifier', ], 'members' => [ 'landingZoneIdentifier' => [ 'shape' => 'String', ], ], ], 'ResetLandingZoneOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'ResourceNotFoundException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 404, 'senderFault' => true, ], 'exception' => true, ], 'ServiceQuotaExceededException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 402, 'senderFault' => true, ], 'exception' => true, ], 'String' => [ 'type' => 'string', ], 'SyntheticTimestamp_date_time' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'TagKey' => [ 'type' => 'string', 'max' => 128, 'min' => 1, ], 'TagKeys' => [ 'type' => 'list', 'member' => [ 'shape' => 'TagKey', ], 'max' => 200, 'min' => 0, ], 'TagMap' => [ 'type' => 'map', 'key' => [ 'shape' => 'TagKey', ], 'value' => [ 'shape' => 'TagValue', ], 'max' => 200, 'min' => 0, ], 'TagResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tags', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tags' => [ 'shape' => 'TagMap', ], ], ], 'TagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'TagValue' => [ 'type' => 'string', 'max' => 256, 'min' => 0, ], 'TargetIdentifier' => [ 'type' => 'string', 'max' => 2048, 'min' => 20, 'pattern' => '^arn:aws[0-9a-zA-Z_\\-:\\/]+$', ], 'TargetRegions' => [ 'type' => 'list', 'member' => [ 'shape' => 'Region', ], ], 'ThrottlingException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], 'quotaCode' => [ 'shape' => 'String', ], 'retryAfterSeconds' => [ 'shape' => 'Integer', 'location' => 'header', 'locationName' => 'Retry-After', ], 'serviceCode' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 429, 'senderFault' => true, ], 'exception' => true, 'retryable' => [ 'throttling' => true, ], ], 'Timestamp' => [ 'type' => 'timestamp', 'timestampFormat' => 'iso8601', ], 'UntagResourceInput' => [ 'type' => 'structure', 'required' => [ 'resourceArn', 'tagKeys', ], 'members' => [ 'resourceArn' => [ 'shape' => 'Arn', 'location' => 'uri', 'locationName' => 'resourceArn', ], 'tagKeys' => [ 'shape' => 'TagKeys', 'location' => 'querystring', 'locationName' => 'tagKeys', ], ], ], 'UntagResourceOutput' => [ 'type' => 'structure', 'members' => [], ], 'UpdateEnabledBaselineInput' => [ 'type' => 'structure', 'required' => [ 'baselineVersion', 'enabledBaselineIdentifier', ], 'members' => [ 'baselineVersion' => [ 'shape' => 'BaselineVersion', ], 'enabledBaselineIdentifier' => [ 'shape' => 'Arn', ], 'parameters' => [ 'shape' => 'EnabledBaselineParameters', ], ], ], 'UpdateEnabledBaselineOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'UpdateEnabledControlInput' => [ 'type' => 'structure', 'required' => [ 'enabledControlIdentifier', 'parameters', ], 'members' => [ 'enabledControlIdentifier' => [ 'shape' => 'Arn', ], 'parameters' => [ 'shape' => 'EnabledControlParameters', ], ], ], 'UpdateEnabledControlOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'UpdateLandingZoneInput' => [ 'type' => 'structure', 'required' => [ 'landingZoneIdentifier', 'manifest', 'version', ], 'members' => [ 'landingZoneIdentifier' => [ 'shape' => 'String', ], 'manifest' => [ 'shape' => 'Manifest', ], 'version' => [ 'shape' => 'LandingZoneVersion', ], ], ], 'UpdateLandingZoneOutput' => [ 'type' => 'structure', 'required' => [ 'operationIdentifier', ], 'members' => [ 'operationIdentifier' => [ 'shape' => 'OperationIdentifier', ], ], ], 'ValidationException' => [ 'type' => 'structure', 'required' => [ 'message', ], 'members' => [ 'message' => [ 'shape' => 'String', ], ], 'error' => [ 'httpStatusCode' => 400, 'senderFault' => true, ], 'exception' => true, ], ],];
