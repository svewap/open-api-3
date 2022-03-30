<?php

namespace Github\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Github\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Github\\Model\\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutput';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Github\\Model\\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutput';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Github\Model\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutput();
        $validator = new \Github\Validator\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutputValidator();
        $validator->validate($data);
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('title', $data)) {
            $object->setTitle($data['title']);
        }
        if (\array_key_exists('summary', $data)) {
            $object->setSummary($data['summary']);
        }
        if (\array_key_exists('text', $data)) {
            $object->setText($data['text']);
        }
        if (\array_key_exists('annotations', $data)) {
            $values = array();
            foreach ($data['annotations'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Github\\Model\\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutputAnnotationsItem', 'json', $context);
            }
            $object->setAnnotations($values);
        }
        if (\array_key_exists('images', $data)) {
            $values_1 = array();
            foreach ($data['images'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Github\\Model\\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutputImagesItem', 'json', $context);
            }
            $object->setImages($values_1);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        $data['summary'] = $object->getSummary();
        if (null !== $object->getText()) {
            $data['text'] = $object->getText();
        }
        if (null !== $object->getAnnotations()) {
            $values = array();
            foreach ($object->getAnnotations() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['annotations'] = $values;
        }
        if (null !== $object->getImages()) {
            $values_1 = array();
            foreach ($object->getImages() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['images'] = $values_1;
        }
        $validator = new \Github\Validator\ReposOwnerRepoCheckRunsCheckRunIdPatchBodyOutputValidator();
        $validator->validate($data);
        return $data;
    }
}