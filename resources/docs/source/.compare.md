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
        "name": "Prova 3\/Final",
        "order": 3
    },
    {
        "id": 4,
        "name": "Testes\/Listas",
        "order": 4
    },
    {
        "id": 5,
        "name": "Outra",
        "order": 5
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
        "semester": "2020.1",
        "file": "mab123\/tony_2020_1_p1.pdf",
        "google_id": "9074981498141209",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 1,
        "exam_type_id": 1,
        "created_at": "2020-05-11T21:08:37.000000Z",
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
    "semester": "2020.1",
    "file": "mab123\/tony_2020_1_p1.pdf",
    "google_id": "9074981498141209",
    "reports": 0,
    "subject_id": 1,
    "professor_id": 1,
    "exam_type_id": 1,
    "created_at": "2020-05-11T21:08:37.000000Z",
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
{
    "TODO": "Implement PDF response ExamController@send_file_response",
    "file": "mab123\/tony_2020_1_p1.pdf"
}
```

### HTTP Request
`GET api/courses/{course_id}/subjects/{subject_id}/exams/{exam_id}/file`


<!-- END_6a5c1f131e3de4df4bdacf08514b9046 -->

<!-- START_7badf3a66084d41ac6663d0765d05244 -->
## List exams by professor

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professor/1/exams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professor/1/exams"
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
        "semester": "2020.1",
        "file": "mab123\/tony_2020_1_p1.pdf",
        "google_id": "9074981498141209",
        "reports": 0,
        "subject_id": 1,
        "professor_id": 1,
        "exam_type_id": 1,
        "created_at": "2020-05-11T21:08:37.000000Z",
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
    },
    {
        "id": 2,
        "semester": "2019.2",
        "file": "mab121\/tony_2019_2_p1.pdf",
        "google_id": "9074981498141209",
        "reports": 0,
        "subject_id": 2,
        "professor_id": 1,
        "exam_type_id": 1,
        "created_at": "2020-05-11T21:08:37.000000Z",
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
            "id": 2,
            "code": "MAB121",
            "name": "Organização da informação",
            "semester": 2,
            "course_id": 1
        }
    }
]
```

### HTTP Request
`GET api/courses/{course_id}/professor/{professor_id}/exams`


<!-- END_7badf3a66084d41ac6663d0765d05244 -->

<!-- START_cc5706d8adedbfa28d610280f190be84 -->
## Get exam information by professor

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professor/1/exams/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professor/1/exams/1"
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
    "semester": "2020.1",
    "file": "mab123\/tony_2020_1_p1.pdf",
    "google_id": "9074981498141209",
    "reports": 0,
    "subject_id": 1,
    "professor_id": 1,
    "exam_type_id": 1,
    "created_at": "2020-05-11T21:08:37.000000Z",
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

### HTTP Request
`GET api/courses/{course_id}/professor/{professor_id}/exams/{exam_id}`


<!-- END_cc5706d8adedbfa28d610280f190be84 -->

<!-- START_e935c26f8d4e7b9681c0e505e436b898 -->
## Get exam PDF file by professor

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/courses/1/professor/1/exams/1/file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/courses/1/professor/1/exams/1/file"
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
    "TODO": "Implement PDF response ExamController@send_file_response",
    "file": "mab123\/tony_2020_1_p1.pdf"
}
```

### HTTP Request
`GET api/courses/{course_id}/professor/{professor_id}/exams/{exam_id}/file`


<!-- END_e935c26f8d4e7b9681c0e505e436b898 -->

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
        "name": "Tony Stark",
        "course_id": 1
    },
    {
        "id": 2,
        "name": "George VI",
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
    "name": "Tony Stark",
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
        "code": "MAB123",
        "name": "Sistemas de Informação",
        "semester": 1,
        "course_id": 1
    },
    {
        "id": 2,
        "code": "MAB121",
        "name": "Organização da informação",
        "semester": 2,
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
    "code": "MAB123",
    "name": "Sistemas de Informação",
    "semester": 1,
    "course_id": 1
}
```

### HTTP Request
`GET api/courses/{course_id}/subjects/{subject_id}`


<!-- END_d9827eb7d7eb1da3e9aea3552a5e7cc6 -->


