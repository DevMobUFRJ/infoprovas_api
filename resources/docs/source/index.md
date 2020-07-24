---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost:8000/docs/collection.json)

<!-- END_INFO -->

#Contacts

Submit a message to the server management team.
<!-- START_30a7ad44c4383c85c240df8f76cd8c54 -->
## Route to receive contact messages to the platform.

The form must also implement the ReCaptcha v2 using the correct client token for the site.

In the future, this method may relay the message to an email address as well.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"repellendus","email":"ullam","subject":"saepe","message":"quis","g-recaptcha-response":"quisquam"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "repellendus",
    "email": "ullam",
    "subject": "saepe",
    "message": "quis",
    "g-recaptcha-response": "quisquam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": "Message submitted"
}
```

### HTTP Request
`POST api/contact`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name of the sender. Max length: 255.
        `email` | string |  required  | Email of the sender. Max length: 255.
        `subject` | string |  required  | Subject of the message. Max length: 255.
        `message` | string |  required  | The message for the team. Max length: 2000.
        `g-recaptcha-response` | string |  required  | The Google Captcha token to validate the submission.
    
<!-- END_30a7ad44c4383c85c240df8f76cd8c54 -->

#Courses

Course details and management
<!-- START_0ec32a5c7dac7b493d908412c6b29324 -->
## List all courses

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "nome": "Ciência da Computação"
    },
    {
        "id": 2,
        "nome": "Administração"
    }
]
```

### HTTP Request
`GET api/courses`


<!-- END_0ec32a5c7dac7b493d908412c6b29324 -->

<!-- START_be98f1b1f6f65fcf6c1b1718f94f019e -->
## Get course information

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "nome": "Ciência da Computação"
}
```

### HTTP Request
`GET api/courses/{course_id}`


<!-- END_be98f1b1f6f65fcf6c1b1718f94f019e -->

#Exam Types


The Exam Type is a class to differentiate exams, like Frist, Second, Third, or Final Exams.

Every exam has a Type. The Exam Type information is usually sent along with the exam on a normal request, to
avoid the need for multiple requests.
<!-- START_a097af1b7a5d39e055ec490b8788c654 -->
## List Exam Types

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/exam_types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/exam_types"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "Prova 1",
        "order": 1
    },
    {
        "id": 2,
        "name": "Prova 2",
        "order": 2
    },
    {
        "id": 3,
        "name": "Prova 3",
        "order": 3
    },
    {
        "id": 4,
        "name": "Prova Final",
        "order": 4
    },
    {
        "id": 5,
        "name": "2ª Chamada",
        "order": 5
    },
    {
        "id": 6,
        "name": "Outros",
        "order": 6
    }
]
```

### HTTP Request
`GET api/exam_types`


<!-- END_a097af1b7a5d39e055ec490b8788c654 -->

<!-- START_56f0cd3ae86b6757982225e6e8e7395b -->
## Get Exam Type information

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/exam_types/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/exam_types/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Prova 1",
    "order": 1
}
```

### HTTP Request
`GET api/exam_types/{exam_type_id}`


<!-- END_56f0cd3ae86b6757982225e6e8e7395b -->

#Exams

Exams details and management.

This is the main part of the API, allowing you to list exams, see exam details and the files.

Every route comes filtered either by a subject or a professors, using composite full URLs. This is done to avoid
programming mistakes, requiring you to provide the course, exam, and subject or professor id in the same URL.
Each ID will then be verified to have a real relationship, instead of just considering the exam id alone.
<!-- START_c506130b7728256fbf4fdf3bcf2d6499 -->
## Add Exam to a course

Used to add new exams to the InfoProvas database.

This action requires a Google Authentication. The sender application must implement a Google sign-in strategy,
which will give the sender application a token signed by google, and an identification of the user.
Both the token and the user ID are required and must be valid to be saved into the database.
The token will be checked with the ID to verify the user identity.
More info at https://developers.google.com/identity/sign-in/web/sign-in

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/courses/1/new_exam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"semester":"2020.1","file":"quidem","google_id":"tony.stark@gmail.com","google_token":"voluptatem","subject_id":1,"professor_id":1,"exam_type_id":1}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/new_exam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "semester": "2020.1",
    "file": "quidem",
    "google_id": "tony.stark@gmail.com",
    "google_token": "voluptatem",
    "subject_id": 1,
    "professor_id": 1,
    "exam_type_id": 1
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 4,
    "semester": "2020.1",
    "reports": 0,
    "subject_id": 1,
    "professor_id": 1,
    "exam_type_id": 1,
    "created_at": "2020-05-14T15:16:31",
    "updated_at": "2020-05-14T15:16:31",
    "deleted_at": null,
    "exam_type": {
        "id": 1,
        "name": "Prova 1",
        "order": 1
    },
    "professor": {
        "id": 1,
        "name": "Tony Stark",
        "course_id": 1
    },
    "subject": {
        "id": 1,
        "code": "MAB123",
        "name": "Sistemas de Informação",
        "semester": 1,
        "course_id": 1
    }
}
```
> Example response (404):

```json
{
    "error": "Resource missing"
}
```

### HTTP Request
`POST api/courses/{course_id}/new_exam`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `semester` | string |  required  | A semester string formatted like "2020.1" or "2008.2".
        `file` | file |  required  | The PDF file. File size limit: 8MB.
        `google_id` | string |  required  | The Google email for the user submitting the exam.
        `google_token` | string |  required  | The id_token of the google authentication, signed, to be verified for safety and checked with the google_id.
        `subject_id` | integer |  required  | ID of the subject of the exam.
        `professor_id` | integer |  required  | ID of the professor of the exam.
        `exam_type_id` | integer |  required  | ID of the exam type.
    
<!-- END_c506130b7728256fbf4fdf3bcf2d6499 -->

<!-- START_e7a8e60c0317e4a59aa7fd6667d3e55e -->
## List exams by subject

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/subjects/1/exams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/subjects/1/exams"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "semester": "2006.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 10,
        "semester": "2009.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 40,
        "semester": "2004.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 41,
        "semester": "2005.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 42,
        "semester": "2005.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 212,
        "semester": "2012.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 22,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 22,
            "name": "Geraldo Zimbrão da Silva",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 213,
        "semester": "2012.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 22,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:50.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 22,
            "name": "Geraldo Zimbrão da Silva",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 397,
        "semester": "2016.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 425,
        "semester": "2016.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 52,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 52,
            "name": "Silvana Rossetto",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 426,
        "semester": "2016.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 52,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 52,
            "name": "Silvana Rossetto",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 427,
        "semester": "2016.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 52,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 52,
            "name": "Silvana Rossetto",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 428,
        "semester": "2016.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 52,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 52,
            "name": "Silvana Rossetto",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 436,
        "semester": "2016.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 52,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 52,
            "name": "Silvana Rossetto",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 440,
        "semester": "2016.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:05.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 505,
        "semester": "2017.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 97,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 97,
            "name": "Allan Goulart",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 506,
        "semester": "2017.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 97,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 97,
            "name": "Allan Goulart",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 518,
        "semester": "2018.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 96,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 96,
            "name": "Giseli Rabello",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 519,
        "semester": "2018.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 96,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 96,
            "name": "Giseli Rabello",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 520,
        "semester": "2018.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 96,
        "exam_type_id": 5,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 5,
            "name": "2ª Chamada",
            "order": 5
        },
        "professor": {
            "id": 96,
            "name": "Giseli Rabello",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 521,
        "semester": "2016.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 55,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 55,
            "name": "Valeria Bastos",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 522,
        "semester": "2017.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 55,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 55,
            "name": "Valeria Bastos",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 523,
        "semester": "2016.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 55,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 55,
            "name": "Valeria Bastos",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 524,
        "semester": "2017.1",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 55,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 55,
            "name": "Valeria Bastos",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 536,
        "semester": "2017.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 1,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 1,
            "name": "Prova 1",
            "order": 1
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 537,
        "semester": "2017.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 2,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 2,
            "name": "Prova 2",
            "order": 2
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    },
    {
        "id": 538,
        "semester": "2017.2",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 3,
        "exam_type_id": 4,
        "created_at": "2020-05-23T19:58:06.000000Z",
        "updated_at": "2020-05-27T20:35:51.000000Z",
        "deleted_at": null,
        "exam_type": {
            "id": 4,
            "name": "Prova Final",
            "order": 4
        },
        "professor": {
            "id": 3,
            "name": "Adriano Joaquim de Oliveira Cruz",
            "course_id": 1
        },
        "subject": {
            "id": 1,
            "code": "MAB120",
            "name": "Computação I",
            "semester": 1,
            "course_id": 1
        }
    }
]
```

### HTTP Request
`GET api/courses/{course_id}/subjects/{subject_id}/exams`


<!-- END_e7a8e60c0317e4a59aa7fd6667d3e55e -->

<!-- START_9edccfba30d81a7eddc081798d546f00 -->
## Get exam information by subject

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/subjects/1/exams/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/subjects/1/exams/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "semester": "2006.1",
    "reports": 0,
    "subject_id": 1,
    "professor_id": 3,
    "exam_type_id": 1,
    "created_at": "2020-05-23T19:58:05.000000Z",
    "updated_at": "2020-05-27T20:35:50.000000Z",
    "deleted_at": null,
    "exam_type": {
        "id": 1,
        "name": "Prova 1",
        "order": 1
    },
    "professor": {
        "id": 3,
        "name": "Adriano Joaquim de Oliveira Cruz",
        "course_id": 1
    },
    "subject": {
        "id": 1,
        "code": "MAB120",
        "name": "Computação I",
        "semester": 1,
        "course_id": 1
    }
}
```

### HTTP Request
`GET api/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}`


<!-- END_9edccfba30d81a7eddc081798d546f00 -->

<!-- START_6a5c1f131e3de4df4bdacf08514b9046 -->
## Get exam PDF file by subject.

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/subjects/1/exams/1/file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/subjects/1/exams/1/file"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}/file`


<!-- END_6a5c1f131e3de4df4bdacf08514b9046 -->

<!-- START_d7f5eb125efc00b9de634d415ea26299 -->
## Report exam by subject.

This route should be used to report fake/wrong exams, spam, or any inappropriate content.

The body of this POST request doesn't need any information.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/courses/1/subjects/1/exams/1/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/subjects/1/exams/1/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}/report`


<!-- END_d7f5eb125efc00b9de634d415ea26299 -->

<!-- START_f41f190e38c56d4b942f08ee7c6b6166 -->
## List exams by professor

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professors/1/exams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professors/1/exams"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[]
```

### HTTP Request
`GET api/courses/{course_id}/professors/{professor_id}/exams`


<!-- END_f41f190e38c56d4b942f08ee7c6b6166 -->

<!-- START_e36dd74e050393c803678c2464d46a47 -->
## Get exam information by professor

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professors/1/exams/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professors/1/exams/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error_code": 10,
    "error_message": "Prova não encontrada no professor solicitado"
}
```

### HTTP Request
`GET api/courses/{course_id}/professors/{professor_id}/exams/{exam_id}`


<!-- END_e36dd74e050393c803678c2464d46a47 -->

<!-- START_376dd9913b1910d7e70e4ae5718cb786 -->
## Get exam PDF file by professor

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professors/1/exams/1/file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professors/1/exams/1/file"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "error_code": 10,
    "error_message": "Prova não encontrada no professor solicitado"
}
```

### HTTP Request
`GET api/courses/{course_id}/professors/{professor_id}/exams/{exam_id}/file`


<!-- END_376dd9913b1910d7e70e4ae5718cb786 -->

<!-- START_5b76dd9e2b34827b11f811f137c82077 -->
## Report exam by professor.

This route should be used to report fake/wrong exams, spam, or any inappropriate content.

The body of this POST request doesn't need any information.

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/courses/1/professors/1/exams/1/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professors/1/exams/1/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/courses/{course_id}/professors/{professor_id}/exams/{exam_id}/report`


<!-- END_5b76dd9e2b34827b11f811f137c82077 -->

#Professors

Professors details.

Every exam has a Professor. The professor information (name and ID) is usually sent along with the exam on a
normal request, to avoid the need for multiple requests.
<!-- START_6ad10324c60cd0386b746b22637cebc0 -->
## List Professors of a Course

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "Maria Luiza Machado Campos",
        "course_id": 1
    },
    {
        "id": 2,
        "name": "Adriana Santarosa Vivacqua",
        "course_id": 1
    },
    {
        "id": 3,
        "name": "Adriano Joaquim de Oliveira Cruz",
        "course_id": 1
    },
    {
        "id": 4,
        "name": "Ageu Cavalcanti Pacheco Junior",
        "course_id": 1
    },
    {
        "id": 5,
        "name": "Aline Martins Paes",
        "course_id": 1
    },
    {
        "id": 6,
        "name": "Angela Maria Gonçalves Leal",
        "course_id": 1
    },
    {
        "id": 7,
        "name": "Antonio Carlos Gay Thomé",
        "course_id": 1
    },
    {
        "id": 8,
        "name": "Carla Amor Divino Moreira Delgado",
        "course_id": 1
    },
    {
        "id": 9,
        "name": "Carlos Alberto da Silva Franco",
        "course_id": 1
    },
    {
        "id": 10,
        "name": "Claudson Ferreira Bornstein",
        "course_id": 1
    },
    {
        "id": 11,
        "name": "Daniel G. Alfaro Vigo",
        "course_id": 1
    },
    {
        "id": 12,
        "name": "Daniel Sadoc Menasche",
        "course_id": 1
    },
    {
        "id": 13,
        "name": "Eber Assis Schmitz",
        "course_id": 1
    },
    {
        "id": 14,
        "name": "Edil S. T. Fernandes",
        "course_id": 1
    },
    {
        "id": 15,
        "name": "Eduardo Peixoto Paz",
        "course_id": 1
    },
    {
        "id": 16,
        "name": "Fabio Mascarenhas",
        "course_id": 1
    },
    {
        "id": 17,
        "name": "Fernando Silva Pereira Manso",
        "course_id": 1
    },
    {
        "id": 18,
        "name": "Flávia Delicato",
        "course_id": 1
    },
    {
        "id": 19,
        "name": "Flávio Assemany",
        "course_id": 1
    },
    {
        "id": 20,
        "name": "Gabriel Pereira da Silva",
        "course_id": 1
    },
    {
        "id": 21,
        "name": "Geraldo Bonorino Xexéo",
        "course_id": 1
    },
    {
        "id": 22,
        "name": "Geraldo Zimbrão da Silva",
        "course_id": 1
    },
    {
        "id": 23,
        "name": "Guilherme Chagas Rodrigues",
        "course_id": 1
    },
    {
        "id": 24,
        "name": "Ivan da Costa Marques",
        "course_id": 1
    },
    {
        "id": 25,
        "name": "Jonice de Oliveira Sampaio",
        "course_id": 1
    },
    {
        "id": 26,
        "name": "Josefino Cabral Melo Lima",
        "course_id": 1
    },
    {
        "id": 27,
        "name": "José Fábio Marinho de Araújo",
        "course_id": 1
    },
    {
        "id": 28,
        "name": "João Carlos Pereira da Silva",
        "course_id": 1
    },
    {
        "id": 29,
        "name": "João Lauro Dornelles Facó",
        "course_id": 1
    },
    {
        "id": 30,
        "name": "Juliana Vianna Valério",
        "course_id": 1
    },
    {
        "id": 31,
        "name": "Leandro Schaeffer Marturelli",
        "course_id": 1
    },
    {
        "id": 32,
        "name": "Luis Menasché Schechter",
        "course_id": 1
    },
    {
        "id": 33,
        "name": "Luziane Ferreira de Mendonça",
        "course_id": 1
    },
    {
        "id": 34,
        "name": "Marcello Goulart Teixeira",
        "course_id": 1
    },
    {
        "id": 35,
        "name": "Marcos Roberto da Silva Borges",
        "course_id": 1
    },
    {
        "id": 36,
        "name": "Maria Helena Cautiero Horta Jardim",
        "course_id": 1
    },
    {
        "id": 37,
        "name": "Mauro Antonio Rincon",
        "course_id": 1
    },
    {
        "id": 38,
        "name": "Miguel Jonathan",
        "course_id": 1
    },
    {
        "id": 39,
        "name": "Mitre Costa Dourado",
        "course_id": 1
    },
    {
        "id": 40,
        "name": "Márcia Helena da Costa Fampa",
        "course_id": 1
    },
    {
        "id": 41,
        "name": "Márcia Rosana Cerioli",
        "course_id": 1
    },
    {
        "id": 42,
        "name": "Mário Roberto F. Benevides",
        "course_id": 1
    },
    {
        "id": 43,
        "name": "Nelson Quilula Vasconcelos",
        "course_id": 1
    },
    {
        "id": 44,
        "name": "Paulo Henrique de Aguiar Rodrigues",
        "course_id": 1
    },
    {
        "id": 45,
        "name": "Paulo Pires",
        "course_id": 1
    },
    {
        "id": 46,
        "name": "Paulo Roberto Godoy Bordoni",
        "course_id": 1
    },
    {
        "id": 47,
        "name": "Paulo Roma Cavalcanti",
        "course_id": 1
    },
    {
        "id": 48,
        "name": "Pedro Manoel da Silveira",
        "course_id": 1
    },
    {
        "id": 49,
        "name": "Raphael",
        "course_id": 1
    },
    {
        "id": 50,
        "name": "Rodrigo Penteado Ribeiro de Toledo",
        "course_id": 1
    },
    {
        "id": 51,
        "name": "Severino Collier Coutinho",
        "course_id": 1
    },
    {
        "id": 52,
        "name": "Silvana Rossetto",
        "course_id": 1
    },
    {
        "id": 53,
        "name": "Sulamita Klein",
        "course_id": 1
    },
    {
        "id": 54,
        "name": "Susana Scheimberg de Makler",
        "course_id": 1
    },
    {
        "id": 55,
        "name": "Valeria Bastos",
        "course_id": 1
    },
    {
        "id": 56,
        "name": "Vinícius Gusmão Pereira de Sá",
        "course_id": 1
    },
    {
        "id": 57,
        "name": "Wendel Alexandre Xavier de Melo",
        "course_id": 1
    },
    {
        "id": 58,
        "name": "Monique Carmona",
        "course_id": 1
    },
    {
        "id": 59,
        "name": "Marcelo Byrro",
        "course_id": 1
    },
    {
        "id": 60,
        "name": "Flávio Dickstein",
        "course_id": 1
    },
    {
        "id": 61,
        "name": "João Caminada",
        "course_id": 1
    },
    {
        "id": 62,
        "name": "Marco Cabral",
        "course_id": 1
    },
    {
        "id": 63,
        "name": "Alexis Hernández",
        "course_id": 1
    },
    {
        "id": 64,
        "name": "Fábio Protti",
        "course_id": 1
    },
    {
        "id": 65,
        "name": "César J. Niche",
        "course_id": 1
    },
    {
        "id": 66,
        "name": "Joaquim Lopes Neto",
        "course_id": 1
    },
    {
        "id": 67,
        "name": "Felipe Sales",
        "course_id": 1
    },
    {
        "id": 68,
        "name": "Lacramiora Marianty Ionel",
        "course_id": 1
    },
    {
        "id": 69,
        "name": "Celina Miraglia Herrera De Figueiredo",
        "course_id": 1
    },
    {
        "id": 70,
        "name": "Paulo Carrilho",
        "course_id": 1
    },
    {
        "id": 71,
        "name": "Henrique Bocshi Filho",
        "course_id": 1
    },
    {
        "id": 72,
        "name": "Filadelfo Cardoso Santos",
        "course_id": 1
    },
    {
        "id": 73,
        "name": "Carlos Renato Mota",
        "course_id": 1
    },
    {
        "id": 74,
        "name": "Rolci Cipolatti",
        "course_id": 1
    },
    {
        "id": 75,
        "name": "Jorge Luis Vivas Barreto",
        "course_id": 1
    },
    {
        "id": 76,
        "name": "Alexandre Soares",
        "course_id": 1
    },
    {
        "id": 77,
        "name": "Luca Roberto Augusto Moriconi",
        "course_id": 1
    },
    {
        "id": 78,
        "name": "Raymundo De Oliveira",
        "course_id": 1
    },
    {
        "id": 79,
        "name": "Não Informado",
        "course_id": 1
    },
    {
        "id": 80,
        "name": "Cálculo Unificado",
        "course_id": 1
    },
    {
        "id": 81,
        "name": "Paulo Goldfeld",
        "course_id": 1
    },
    {
        "id": 82,
        "name": "Lacramioara Marianty Ionel",
        "course_id": 1
    },
    {
        "id": 83,
        "name": "Francesco Noseda",
        "course_id": 1
    },
    {
        "id": 84,
        "name": "Juan López Gondar",
        "course_id": 1
    },
    {
        "id": 85,
        "name": "Ildeu De Castro Moreira",
        "course_id": 1
    },
    {
        "id": 86,
        "name": "Ricardo Rosa",
        "course_id": 1
    },
    {
        "id": 87,
        "name": "Marina Silva Paez",
        "course_id": 1
    },
    {
        "id": 88,
        "name": "Dora Izzo",
        "course_id": 1
    },
    {
        "id": 89,
        "name": "André Saraiva",
        "course_id": 1
    },
    {
        "id": 90,
        "name": "Outro Professor",
        "course_id": 1
    },
    {
        "id": 91,
        "name": "Nei Rocha",
        "course_id": 1
    },
    {
        "id": 92,
        "name": "Felipe Acker",
        "course_id": 1
    },
    {
        "id": 93,
        "name": "Fabio Ramos",
        "course_id": 1
    },
    {
        "id": 94,
        "name": "Fernando Cardoso Lopes",
        "course_id": 1
    },
    {
        "id": 95,
        "name": "João Paixão",
        "course_id": 1
    },
    {
        "id": 96,
        "name": "Giseli Rabello",
        "course_id": 1
    },
    {
        "id": 97,
        "name": "Allan Goulart",
        "course_id": 1
    },
    {
        "id": 98,
        "name": "Anamaria Martins Moreira",
        "course_id": 1
    },
    {
        "id": 99,
        "name": "Daniel Schneider",
        "course_id": 1
    }
]
```

### HTTP Request
`GET api/courses/{course_id}/professors`


<!-- END_6ad10324c60cd0386b746b22637cebc0 -->

<!-- START_2cf1b2a52f2d10f99ff938aa1d61ee6b -->
## Get professor details by Course

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name": "Maria Luiza Machado Campos",
    "course_id": 1
}
```

### HTTP Request
`GET api/courses/{course_id}/professors/{professor_id}`


<!-- END_2cf1b2a52f2d10f99ff938aa1d61ee6b -->

#Subjects

Subject details.

Every exam belongs to a subject. The subject information (name, code, id etc) is usually sent along with
the exam on a normal request, to avoid the need for multiple requests.
<!-- START_0f0b0853062a6268959a47544d6e6fdb -->
## List subjects on a Course

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/subjects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/subjects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "code": "MAB120",
        "name": "Computação I",
        "semester": 1,
        "course_id": 1
    },
    {
        "id": 2,
        "code": "MAE111",
        "name": "Cálculo Infinitesimal I",
        "semester": 1,
        "course_id": 1
    },
    {
        "id": 3,
        "code": "MAB624",
        "name": "Números Inteiros e Criptografia",
        "semester": 1,
        "course_id": 1
    },
    {
        "id": 4,
        "code": "MAB111",
        "name": "Fundamentos da Computação Digital",
        "semester": 1,
        "course_id": 1
    },
    {
        "id": 5,
        "code": "MAB112",
        "name": "Sistemas de Informação",
        "semester": 1,
        "course_id": 1
    },
    {
        "id": 6,
        "code": "MAB240",
        "name": "Computação II",
        "semester": 2,
        "course_id": 1
    },
    {
        "id": 7,
        "code": "MAE992",
        "name": "Cálculo Integral e Diferencial II",
        "semester": 2,
        "course_id": 1
    },
    {
        "id": 8,
        "code": "MAB352",
        "name": "Matemática Combinatória",
        "semester": 2,
        "course_id": 1
    },
    {
        "id": 9,
        "code": "MAB113",
        "name": "Organização da Informação",
        "semester": 2,
        "course_id": 1
    },
    {
        "id": 10,
        "code": "MAB245",
        "name": "Circuitos Lógicos",
        "semester": 2,
        "course_id": 1
    },
    {
        "id": 11,
        "code": "FIW125",
        "name": "Mecânica, Oscilações e Ondas",
        "semester": 3,
        "course_id": 1
    },
    {
        "id": 12,
        "code": "MAB115",
        "name": "Álgebra Linear Algorítmica",
        "semester": 3,
        "course_id": 1
    },
    {
        "id": 13,
        "code": "MAB123",
        "name": "Linguagens Formais",
        "semester": 3,
        "course_id": 1
    },
    {
        "id": 14,
        "code": "MAB116",
        "name": "Estrutura de Dados",
        "semester": 3,
        "course_id": 1
    },
    {
        "id": 15,
        "code": "MAB353",
        "name": "Computadores e Programação",
        "semester": 3,
        "course_id": 1
    },
    {
        "id": 16,
        "code": "MAE993",
        "name": "Cálculo Integral e Diferencial III",
        "semester": 3,
        "course_id": 1
    },
    {
        "id": 17,
        "code": "MAE994",
        "name": "Cálculo Integral e Diferencial IV",
        "semester": 4,
        "course_id": 1
    },
    {
        "id": 18,
        "code": "MAB230",
        "name": "Cálculo Numérico",
        "semester": 4,
        "course_id": 1
    },
    {
        "id": 19,
        "code": "FIW230",
        "name": "Eletromagnetismo e Ótica",
        "semester": 4,
        "course_id": 1
    },
    {
        "id": 20,
        "code": "MAB117",
        "name": "Computação Concorrente",
        "semester": 4,
        "course_id": 1
    },
    {
        "id": 21,
        "code": "MAB368",
        "name": "Algoritmos e Grafos",
        "semester": 4,
        "course_id": 1
    },
    {
        "id": 22,
        "code": "MAB236",
        "name": "Lógica",
        "semester": 5,
        "course_id": 1
    },
    {
        "id": 23,
        "code": "MAB471",
        "name": "Compiladores I",
        "semester": 5,
        "course_id": 1
    },
    {
        "id": 24,
        "code": "MAB533",
        "name": "Fundamentos da Engenharia de Software",
        "semester": 5,
        "course_id": 1
    },
    {
        "id": 25,
        "code": "MAB489",
        "name": "Banco de Dados I",
        "semester": 5,
        "course_id": 1
    },
    {
        "id": 26,
        "code": "MAB354",
        "name": "Computadores e Sociedade",
        "semester": 5,
        "course_id": 1
    },
    {
        "id": 27,
        "code": "MAB355",
        "name": "Arquitetura de Computadores I",
        "semester": 5,
        "course_id": 1
    },
    {
        "id": 28,
        "code": "MAB122",
        "name": "Computação Gráfica I",
        "semester": 6,
        "course_id": 1
    },
    {
        "id": 29,
        "code": "MAB508",
        "name": "Inteligência Artificial",
        "semester": 6,
        "course_id": 1
    },
    {
        "id": 30,
        "code": "MAD243",
        "name": "Estatística e Probabilidade",
        "semester": 6,
        "course_id": 1
    },
    {
        "id": 31,
        "code": "MAB232",
        "name": "Programação Linear I",
        "semester": 6,
        "course_id": 1
    },
    {
        "id": 32,
        "code": "MAB515",
        "name": "Avaliação e Desempenho",
        "semester": 7,
        "course_id": 1
    },
    {
        "id": 33,
        "code": "MAB366",
        "name": "Sistemas Operacionais I",
        "semester": 7,
        "course_id": 1
    },
    {
        "id": 34,
        "code": "MAB510",
        "name": "Teleprocessamento e Redes",
        "semester": 8,
        "course_id": 1
    },
    {
        "id": 35,
        "code": "MAB528",
        "name": "Tópicos Especiais em Algoritmos",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 36,
        "code": "MAB369",
        "name": "Arquitetura de Computadores II",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 37,
        "code": "MAB635",
        "name": "Laboratório de Sistemas Digitais",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 38,
        "code": "MAB622",
        "name": "Programação Paralela e Distribuída",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 39,
        "code": "MAB242",
        "name": "Computação III",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 40,
        "code": "MAB529",
        "name": "Sistemas Complexos Inteligentes I",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 41,
        "code": "MAB608",
        "name": "Tópicos Especiais em Inteligência Computacional",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 42,
        "code": "MAB525",
        "name": "Tópicos Especiais em Inteligência Artificial",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 43,
        "code": "MAB517",
        "name": "Análise Numérica de Equações Diferenciais Parciais I",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 44,
        "code": "MAB478",
        "name": "Métodos Numéricos I",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 45,
        "code": "MAB616",
        "name": "Interface Humano Computador",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 46,
        "code": "MAB527",
        "name": "Tópicos Especiais em Sistemas de Informação",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 47,
        "code": "MAB638",
        "name": "Computação Algébrica I",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 48,
        "code": "MAB634",
        "name": "Conhecimento e Inovação",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 49,
        "code": "IEE115",
        "name": "Economia",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 50,
        "code": "MAB607",
        "name": "Empreendimentos em Informática",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 51,
        "code": "MAB637",
        "name": "Governança da Internet",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 52,
        "code": "MAB601",
        "name": "Tópicos Especiais em Engenharia de Software (Jogos)",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 53,
        "code": "MAB539",
        "name": "Desenvolvimento Ágil",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 54,
        "code": "MAB367",
        "name": "Sistemas Distribuídos",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 55,
        "code": "MAB606",
        "name": "Tópicos Especiais em Programação (Linux)",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 56,
        "code": "MAB003",
        "name": "Tópicos Especiais em Sistemas de Informação (Segurança)",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 57,
        "code": "MAB605",
        "name": "Recuperação da Informação",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 58,
        "code": "MAB535",
        "name": "Modelagem De Sistemas De Informação",
        "semester": 0,
        "course_id": 1
    },
    {
        "id": 59,
        "code": "MAB609",
        "name": "Tópicos Especiais Em Banco De Dados I",
        "semester": 0,
        "course_id": 1
    }
]
```

### HTTP Request
`GET api/courses/{course_id}/subjects`


<!-- END_0f0b0853062a6268959a47544d6e6fdb -->

<!-- START_d9827eb7d7eb1da3e9aea3552a5e7cc6 -->
## Get subject details by course

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/subjects/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/subjects/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "code": "MAB120",
    "name": "Computação I",
    "semester": 1,
    "course_id": 1
}
```

### HTTP Request
`GET api/courses/{course_id}/subjects/{subject_id}`


<!-- END_d9827eb7d7eb1da3e9aea3552a5e7cc6 -->


