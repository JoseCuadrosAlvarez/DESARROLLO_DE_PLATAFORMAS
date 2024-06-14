from ariadne import ObjectType, QueryType, gql, make_executable_schema
from ariadne.asgi import GraphQL

type_defs = gql("""
    type Query {
        users: [User!]!
    }

    type User {
        id: ID!
        username: String!
        age: String!
        email: String!
    }
""")

# ejemplos
users_data = [
    {"id": 1, "username": "Jose", "age": "18", "email": "josefrances06@gmail.com"},
    {"id": 2, "username": "Cuadros", "age": "20", "email": "jose.cuadros.alvarez@ucsp.edu.pe"},
]

# Resolutores
query = QueryType()
user = ObjectType("User")

@query.field("users")
def resolve_users(_, info):
    return users_data

# construir esquema
schema = make_executable_schema(type_defs, query, user)

# config servidor graphql
app = GraphQL(schema, debug=True)

# para compilar - uvicorn main:app --reload