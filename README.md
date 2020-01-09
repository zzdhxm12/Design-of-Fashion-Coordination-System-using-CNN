# Design-of-Fashion-Coordination-System-using-CNN

## CNN

![image](https://user-images.githubusercontent.com/53864655/72070907-f9759900-332d-11ea-880b-c29d6e63f2b8.png)

![image](https://user-images.githubusercontent.com/53864655/72070937-098d7880-332e-11ea-89e2-64817efd179b.png)

CNN은 신경망에 기존의 필터 기술을 병합해 신경망이 2차원 영상을 잘 습득할 수 있도록 최적화한 알고리즘이다. CNN은 크게 convolution-pooling layer와 fully connected layer의 두 부분으로 구성되어 있다. 두 부분은 각각 입력된 이미지로부터 계층적 구조의 특징을 추출하는 역할과 추출된 특징을 입력받아 특정 카테고리로 분류하는 역할을 담당한다.

## Architecture

![image](https://user-images.githubusercontent.com/53864655/72071935-3e9aca80-3330-11ea-9d66-095121c5a036.png)

사용자가 웹에서 의상 이미지를 입력하면 입력된 이미지가 서버로 전달된다. 이때, 서버는 CNN 모델을 실행하여 입력된 이미지의 특징을 추출한 후 이미지의 특징 태그를 서버로 전달한다. 그 후, 서버는 전달받은 태그를 사용하여 데이터베이스를 검색하여 가장 잘 어울리는 의상을 찾아 웹으로 전송하여 출력한다. 태그에 따라 가장 잘 어울리는 의상을 선택한 방식은 [6]의 색채 코디네이션의 종류 중 대조 색상 코디네이션, 유채색과 무채색의 코디네이션에 기반 하였다.

* Database

![image](https://user-images.githubusercontent.com/53864655/72071438-22e2f480-332f-11ea-8f46-410cf2df6318.png)

![image](https://user-images.githubusercontent.com/53864655/72071461-342c0100-332f-11ea-9e28-cf9909602e18.png)

## Dataset

![image](https://user-images.githubusercontent.com/53864655/72070816-bfa49280-332d-11ea-8abe-00e43af60a69.png)

![image](https://user-images.githubusercontent.com/53864655/72071505-486ffe00-332f-11ea-8a0b-68ffe04590ac.png) 

각 카테고리 당 약 1000-3000개의 훈련 데이터와 200-500개의 테스트 데이터를 이용하였다. 학습에 사용된 이미지는 구글과 네이버에서 각 카테고리 별로 이미지 크롤링을 수행하는 파이썬 오픈소스 코드를 사용하여 수집하였다. 크롤링을 통하여 수집된 이미지 중 학습에 방해가 될 만한 이미지들은 제거한 후 각 이미지들에 대한 레이블링을 수행하였다. 학습은 총 5,000번 반복하여 실행하였으며 최종적으로 카테고리 별로 의류를 분류하는 정확도가 95%의 모델을 생성하였다.

## Result

![image](https://user-images.githubusercontent.com/53864655/72070871-e1057e80-332d-11ea-9abe-f1e83cbe6b4b.png)

## Usecase

### 1. 시작페이지

![image](https://user-images.githubusercontent.com/53864655/72071144-7a349500-332e-11ea-9e55-22257b54a156.png)

### 2. 버튼

![image](https://user-images.githubusercontent.com/53864655/72071210-9c2e1780-332e-11ea-8bd7-1cb0f4253963.png)

### 3. 패션 추천 서비스 페이지

* 전체 UI

![image](https://user-images.githubusercontent.com/53864655/72071226-a6e8ac80-332e-11ea-93ff-323777564456.png)

* 패션 아이템 이미지 입력

![image](https://user-images.githubusercontent.com/53864655/72071273-bbc54000-332e-11ea-88fc-44d67339d12b.png)

* 이미지 판별

![image](https://user-images.githubusercontent.com/53864655/72071314-d992a500-332e-11ea-9c93-27ecdaff4b64.png)

* 패션 아이템 추천

![image](https://user-images.githubusercontent.com/53864655/72071341-ea431b00-332e-11ea-825c-64cb7617568a.png)

### 4. 추천 의상 이미지 상세 페이지

* 전체 UI

![image](https://user-images.githubusercontent.com/53864655/72071373-fa5afa80-332e-11ea-9146-c1776d1e88e2.png)

* 자세히 보기

![image](https://user-images.githubusercontent.com/53864655/72071399-0ba40700-332f-11ea-859e-396fa99fe382.png)

