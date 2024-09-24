<?php

namespace Wazezez\AlnairImporter\Serializers;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerFactory implements SerializerFactoryInterface
{
    public function create(): SerializerInterface
    {
        $phpDocExtractor = new PhpDocExtractor();
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader(new AnnotationReader()));
        $extractor = new PropertyInfoExtractor([], [new ConstructorExtractor([$phpDocExtractor]), $phpDocExtractor, new ReflectionExtractor()]);
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $encoders = [new XmlEncoder([
            'remove_empty_tags' => true
        ])];

        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $extractor)
        ];

        return new Serializer($normalizers, $encoders);
    }
}
