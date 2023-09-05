from cerberus import Validator
from src.validator.schemas import schemas


def validate_request(endpoint, data):
    """
    Validate the data against the schema

    :param endpoint: endpoint to validate the request against
    :param data: request data

    :return: dictionary with the validation result
    dictionary will have a key 'valid' with a boolean value
    dictionary will have a key 'errors' with a list of errors if the request is not valid
    """
    schema = schemas.get(endpoint, None)
    if not schema:
        return {'valid': False, 'errors': ['Invalid endpoint']}
    validator = Validator(schema)
    if not validator.validate(data):
        return {'valid': False, 'errors': validator.errors}
    return {'valid': True}
