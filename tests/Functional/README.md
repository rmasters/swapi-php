# Functional API tests

These tests use the live API to check the response is as expected.

The JsonMapper instance is configured to throw an exception whenever a
`@required` property is not present in the JSON payload, or if a new field is
given that isn't on the model.
